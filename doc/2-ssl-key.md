Configure SSL keys for JWT
==========================

## Configure JWT

### Requirements

You have to generate ssl keys, one private and one public. Its call [asymmetric cryptography](https://en.wikipedia.org/wiki/Public-key_cryptography).
In order to generate it, you have to install [OpenSSL](https://en.wikipedia.org/wiki/OpenSSL) on your machine.

#### Linux (Debian based)

```shell
apt install openssl -y
```

#### Windows

Depending on your Windows' version, OpenSSL may be installed on your machine. To check if it's the case, you can run
this command in a terminal `openssl version` and if the version is displayed, OpenSSL is installed.

In case it's not, you can use try the same command in [Git Bash](https://git-scm.com/)'s terminal. If found, you have to
use Git Bash to run the generate command bellow.

You can also install this openssl build for Windows. It's less safe than the solution above. Prefer solution above.
[https://slproweb.com/products/Win32OpenSSL.html](https://slproweb.com/products/Win32OpenSSL.html)

### Generate

Use can use the same command
This command will generate new keys pair based on .env config.

```shell
symfony console lexik:jwt:generate-keypair
```

### In dev projet, use existing keys pair.

On your dev machine, you can also use the same keys pair on every project, you do not have to always generate them.
Of course, don't do that on server expose to Internet.

- Copy keys from another project
- Take a look in `.env` or `.env.local` files in this other project
- Look for env variable `JWT_PASSPHRASE`
- Copy `JWT_PASSPHRASE` to your `.env.local` in this project
