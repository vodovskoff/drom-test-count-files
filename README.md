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

### 3. Fill config.json
Specify the directories you want to traverse in the `config.json` and delimiter for numbers in files

### 4. Run the script
```bash
make run-count
```