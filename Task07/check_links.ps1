Get-Item "C:\Users\$env:UserName\Desktop\*.lnk" | ForEach-Object {
$shell = New-Object -COM WScript.Shell
$shortcut = $shell.CreateShortcut($_.FullName)



If (!(Test-Path -Path $shortcut.TargetPath)) {
        If (!(Test-Path C:\Users\$env:UserName\Desktop\BadLinks)) {
            New-Item -ItemType Directory -Path C:\Users\$env:UserName\Desktop\BadLinks
        }

        Move-Item -Path $shortcut.FullName -Destination "C:\Users\$env:UserName\Desktop\BadLinks"
    }
}