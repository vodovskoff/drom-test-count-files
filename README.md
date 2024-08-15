# Sum Count Files

This project is a script which recursively traverses directories specified in the configuration file, searches for files named `count`, and calculates the sum of all numbers contained in those files

## Requirements

- Docker
- GNU Make

## How to Run

### 1. Create and Start the Container

```bash
make create
```

### 2. To start the container, run the following command:

```bash
make start
```

### 3. Run the script
To run using config.json, specify the directories you want to traverse in the `config.json` and delimiter for numbers in files and run
```bash
make run-count
```
or 
```bash
docker exec -it app-test-drom-1 php src/main.php --use-config
```
<br>

To run using stdin, specify the options in the command line and run, e.g.
```bash
docker exec -it app-test-drom-1 php src/main.php --delimiter=' ' --directories='["./example-dir"]'
```