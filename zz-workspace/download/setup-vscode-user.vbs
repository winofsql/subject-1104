Set fso = Wscript.CreateObject("Scripting.FileSystemObject")
Set WshShell = WScript.CreateObject("WScript.Shell")
path = WshShell.ExpandEnvironmentStrings("%APPDATA%") & "\Code\User"
Set f = fso.GetFolder(path)
Set fc = f.SubFolders
on error resume next
fc.Add("script")
on error goto 0
path = path & "\script"

Set objSrvHTTP = Wscript.CreateObject("Msxml2.ServerXMLHTTP")
Set Stream = Wscript.CreateObject("ADODB.Stream")

Call objSrvHTTP.Open("GET", "https://github.com/winofsql/vscode-template/raw/main/script/download.vbs" & "?dummy=" & Timer, False )
objSrvHTTP.Send
Stream.Open
Stream.Type = 1
Stream.Write objSrvHTTP.responseBody
Stream.SaveToFile path & "\download.vbs", 2
Stream.Close

Call objSrvHTTP.Open("GET", "https://github.com/winofsql/subject/raw/main/zz-workspace/download/setup-vscode-user.vbs" & "?dummy=" & Timer, False )
objSrvHTTP.Send
Stream.Open
Stream.Type = 1
Stream.Write objSrvHTTP.responseBody
Stream.SaveToFile path & "\setup-vscode-user.vbs", 2
Stream.Close

Call objSrvHTTP.Open("GET", "https://github.com/winofsql/vscode-template/raw/main/script/sworc-settings-download.vbs" & "?dummy=" & Timer, False )
objSrvHTTP.Send
Stream.Open
Stream.Type = 1
Stream.Write objSrvHTTP.responseBody
Stream.SaveToFile path & "\sworc-settings-download.vbs", 2
Stream.Close

Call objSrvHTTP.Open("GET", "https://github.com/winofsql/vscode-template/raw/main/script/workspace-build-download.vbs" & "?dummy=" & Timer, False )
objSrvHTTP.Send
Stream.Open
Stream.Type = 1
Stream.Write objSrvHTTP.responseBody
Stream.SaveToFile path & "\workspace-build-download.vbs", 2
Stream.Close

Call objSrvHTTP.Open("GET", "https://github.com/winofsql/vscode-template/raw/main/script/build-xampp-alias.vbs" & "?dummy=" & Timer, False )
objSrvHTTP.Send
Stream.Open
Stream.Type = 1
Stream.Write objSrvHTTP.responseBody
Stream.SaveToFile path & "\build-xampp-alias.vbs", 2
Stream.Close

Call objSrvHTTP.Open("GET", "https://github.com/winofsql/vscode-template/raw/main/script/start-localhost.vbs" & "?dummy=" & Timer, False )
objSrvHTTP.Send
Stream.Open
Stream.Type = 1
Stream.Write objSrvHTTP.responseBody
Stream.SaveToFile path & "\start-localhost.vbs", 2
Stream.Close

Call objSrvHTTP.Open("GET", "https://github.com/winofsql/vscode-template/raw/main/folder-vscode-settings-setup.vbs" & "?dummy=" & Timer, False )
objSrvHTTP.Send
Stream.Open
Stream.Type = 1
Stream.Write objSrvHTTP.responseBody
Stream.SaveToFile path & "\folder-vscode-settings-setup.vbs", 2
Stream.Close

Call objSrvHTTP.Open("GET", "https://github.com/winofsql/vscode-template/raw/main/script/build-tomcat-path.vbs" & "?dummy=" & Timer, False )
objSrvHTTP.Send
Stream.Open
Stream.Type = 1
Stream.Write objSrvHTTP.responseBody
Stream.SaveToFile path & "\build-tomcat-path.vbs", 2
Stream.Close

Call objSrvHTTP.Open("GET", "https://github.com/winofsql/vscode-template/raw/main/script/git-clone.vbs" & "?dummy=" & Timer, False )
objSrvHTTP.Send
Stream.Open
Stream.Type = 1
Stream.Write objSrvHTTP.responseBody
Stream.SaveToFile path & "\git-clone.vbs", 2
Stream.Close
