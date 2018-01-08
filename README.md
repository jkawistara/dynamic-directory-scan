Dynamic Directory Scan
------------------------------------------

About
------
This application count on how many files inside a path with the SAME content. 
Example on the folder DropSuiteTest there are folders content1 = content2 = content3, So the application will return content + number. So in this case is: abcdef 4


Features
------
1. Count the biggest file that has same content.
2. Can read the folder dynamically.
3. User can change the base default folder scanned on config.ini (in defaultDir parameter.)


Requirement
-----------
```
- php7.0-mysql
- php v7.0 or greater
- mysqli
- database imported (see on sql import section below)
```

Running
-------
```
On Shell :
- php index.php
```

```
On Localhost Web Server :
- http://localhost/dynamic-directory-scan/
```


Author
-------
```
Jauhari Khairul Kawistara
<jkawistara@gmail.com>
```

SQL Database Scheme
---------------
Import sql dump first before run this program. 
This sql dump will automatically create scheme/database so please just execute this sql.
Kindly check on:
```
sql/database.sql
```

Database and Default Folder Configuration
---------------
You can found this config on /config/config.ini
```
defaultDir = "DropsuiteTest"
host = "localhost"
user = "root"
password = "password"
dbName = "directories_scan"
```
