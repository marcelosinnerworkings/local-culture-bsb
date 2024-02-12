# Local culture - Brasilia/DF, Brazil

## What is it?

The current project intends to create a basic inventory of the cultural institutions and tourtist attractions of the city of Brasilia, including the main public monuments, museums, and theaters, as well as traditional restaurants, cafés, and bars.

## Why?

Few Brazilian websites gather this set of information in a centralized and simple manner. The effort is to provide a single and reliable source of information for tourists.

Please note that I don't intend to exhaust all the existing institutions: I only present a tentative list, which is continuously being built and improved. 

## How to run it?

1. Clone this repository to your local machine. Please note that Docker should be installed, so that you can run the container.  

2. Using the command line, build the application using Docker:

```docker build -t my-php-app .```

3. Run the container:

```docker run -it --rm -p 8000:8000 --name my-running-app my-php-app```

4. Open your browser and insert ```localhost:8000``` in the address bar. 

5. Please note that you should replace the database connection by the CSV file provided, because the database details are private due to limitations in the cloud service. 

## What is the tech stack?

The stack comprises:

* PHP
* HTML5
* CSS3
* Postgres in the cloud (ElephantSQL)
* Docker