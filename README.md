# GPT-2 article generator tool
[GPT-2](https://gpt-2.com) AI article generator simple PHP script.

With [GPT-2.COM](https://gpt-2.com) fine-tuned model you can generate unique articles in many affiliate marketing niches, for SEO needs such as: PBN, Link Wheels, Doorways, etc ... 

## Setup GPT-2.COM account
1. register on [GPT-2.COM](https://gpt-2.com)
2. select plan and add API units to your account. You can get free coupon for testing in [telegram channel](https://t.me/gpt_2)
3. get your User ID and API key in dashboard


## Installation
Download ZIP file to any folder on machine with PHP, and extract
Make folder 'out' writeable
```bash
chmod 777 out
 ```
Edit file gen.php
replace YOUR _USER_ID and YOUR_API_KEY with values from your GPT-2 account.

## Requirements
Edit your php.ini
```php 
allow_url_fopen = On
max_execution_time = 0
```
## Usage 

Tasks are stored in file **tasks.txt** in the following format:  **title|prefix**

Each line - one article task. Fill tasks.txt with your tasks. Prefix should be 50-250 symbols. The more relevant the better.

Run the script
```bash
php gen.php
 ```
 
Articles will be written to 'out' folder.
