# php-smart-doc-with-ai
Make your own smart doc with this PHP library + vocal commands.


***HOW? - getting started***

1. First you need to install your web server (here on a raspberry pi) [tutorial](https://howtoraspberrypi.com/how-to-install-web-server-raspberry-pi-lamp/)
2. Then download this project to your ``/var/www/html`` directory.
3. Go to the ``config.php`` file and fill out all the variables


***mYour first voice command***

Go to the commands.php file, then you will be able to add your voice command with the ``command()`` function :
* 1st argument: array of question sentences : 'ok google __what's the wheather like ?__'
* 2nd argument: array of response : '__today it will be 5°__'
* 3rd qrgument: [tolerance of characters](https://www.php.net/manual/fr/function.levenshtein.php) between the user question and the 1st argument
* 4th argument: html code to execute

**only the 1st and 2nd arguments are required**
```php
command(['trigger word', 'magic word'], ['what the ai have to say', 'the ai must say'], 2*, 'html code to execute');

//*INT that defines the maximum tolerance (exemple : -user says 'tables' -word registered is 'table' => the tolerance must be 1)

```
