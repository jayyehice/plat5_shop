## Installation

##### STEP

-  將composer的 repositories 預設路徑從packagist 取消 (新增config.json在composer的目錄下，位置可參考環境變數的PATH)
```
{
    "config": {
        "secure-http": false
    },
    "repositories": {
        "packagist": false
    }
}
```

Require this package
```
$ composer require vendor/package
```

## Develop with workbench

-  1.建立開發的套件資料夾 packages
-  2.複製 git 上 repositories 到 packages
-  3.載入相關套件

加入套件位址
```
    "repositories": [
        {
            "type": "path",
            "url": "packages/local/to/package",
            "options": {
                "symlink": true
            }
        }
    ],
    "require": {
        "vendor/package": "dev-dev"
    }
```
