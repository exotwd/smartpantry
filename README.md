
## Run Locally

Clone the project

```bash
  git clone https://github.com/exotwd/smartpantry
```

Go to the project directory

```bash
  cd my-project
```

Install herd: https://herd.laravel.com/windows (this will simplify the process a lot). Add this project into herd. This will host the web server.

```bash
  herd open
```

Now go into .env and configure the database. (Default: mysql)

Run the npm i command to install the js libraries. Then run the frontend.

```bash
  npm install
  npm run build
```

Congratulations you sucessfuly hosted the app yourself!
