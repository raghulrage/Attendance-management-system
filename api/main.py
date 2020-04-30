from app import app

import datetime

import admin

import student

import staff  

@app.route('/')
def hello():
	return 'C:/xampp/htdocs/ajira/index.html'
	
if __name__ == '__main__':
    app.run()
