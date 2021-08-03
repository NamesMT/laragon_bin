Note to self, install guide:  
Install Laragon at D:\laragon  
Run laragon as administrator and launch terminal for first init batch

clone repo, rename laragon_bin to laragon, move to and overwrite D:\laragon  
add env "COMPOSER_HOME" > "D:\laragon\bin\composer"  
add path: D:\laragon\bin\composer\vendor\bin
remove & add laragon to path from laragon menu  
opens terminal and run git clean -fd  

Might have Terminal throwing error on open, use hotkey Win+Alt+T or Settings -> Startup -> Tasks and change 1 {cmd::Cmder as Admin} to:
```*cmd /k "%ConEmuDir%\..\init.bat" -new_console:d:D:\laragon\```
Or anything you want as startup instead of D:\laragon\

*Note: Type 'ter' from Run dialog will launch cmder Terminal*
cmder for vscode: (add to settings.json)

```
"terminal.integrated.shell.windows": "C:\\WINDOWS\\System32\\cmd.exe",
	"terminal.integrated.shellArgs.windows": [
		"/k",
		"D:\\laragon\\bin\\cmder\\vendor\\init.bat"
	],
```

!Sorry for being word-lengthy, costed me a whole damn afternoon & got me real frustrated, you can just skip those with ">>>"
Laragon (v4) settings & updated bin repo, mostly for personal, but feels free to use it tho.
updated (as of 13/03/2021 [d/m/y]):
***!!!Warning:*** only pull if your laragon is on D:\laragon, other cases you should pull to another dir and copy which binaries you want to update
* !-> MANDATORY: remove & add laragon to path from laragon menu after pulling this to your laragon!

* nodejs to latest LTS (14.16.0)
* (if you uses Windows version lower than 10, do:
* -> Add a enviroment variable Name: "NODE_SKIP_PLATFORM_CHECK" with value: "1")
    + npm to its latest stable (7.6.3)
* composer to v2.0.11
    + !-> Add env var Name: "COMPOSER_HOME" with value points to your laragon/bin/composer
    + configs to composer so now it should install Laravel v8 instead of v7
    + Laravel Breeze/Jetstream should works, too!
    \>>>Default nodejs of laravel isn't compatible with Tailwind v2 and the npm that shipped with current latest nodejs LTS gives error when running npm install && npm run dev after install Breeze, also npm self update gives errors too, pain in the @ss to figure out, jezz...
* php to latest 7.4
* Nginx to 1.19.9, use Nginx as default
* ~~git to latest 2.30.1.windows.1~~ git is tooooo large, update it yourself.
* Improved www/index with project listing & internet status checker
    + A light-weight favicon, downloaded Photoshop just for it lmao
    + Project listing automatically adapts to Auto Virtual Hosts config


>~~Note to self: add mingw64 for C&C++ & modify laragon path you dumbass~~
~~bin/laragon/~~ laragon.cmd welp, didn't work as intended, usr/user.cmd also doesn't work for adding custom PATH, I'm done!
