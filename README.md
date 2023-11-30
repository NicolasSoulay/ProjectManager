# ProjectManager

## How to start 

- clone this repository in your apache server: 
```bash
git clone https://github.com/NicolasSoulay/ProjectManager
```
- go to the root file of the project, open the terminal and use the command:
```bash
composer update
```
- create a database, and use the .sql file inside /conception to restore it
- modify the Config class to enable the connection to the database you just restored:
```php
class Config
{
    const DBNAME = '<DB NAME>';
    const DBHOST = 'localhost:<DB PORT>' or '127.0.0.1:<DB PORT>';
    const DBUSER = '<DB USER>';
    const DBPWD = '<DB USER PASSWORD>';
    const ENTITY = 'Nicolas\ProjectManager\Entity\\';
    const CONTROLLER = 'Nicolas\ProjectManager\Controller\\';
    const TEMPLATE_FOLDER = __DIR__ . '/../Views/Templates/';
    const CSS_FOLDER = './src/Assets/css/';
    const JS_FOLDER = './src/Assets/js/';
    const DEFAULT_CONTROLLER = 'IndexController';
    const DEFAULT_METHOD = 'index';
}
```
- use your web browser to display the website, now you can either create a new user, or use the one in the database (email: pepito@pepito.com, password: Pepito123)

## TODO

- Project Controller, Task Controller.
