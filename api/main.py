from app import app

from flask import Flask,redirect

import webbrowser

import datetime

import admin

import student

import staff  

@app.route('/')
def hello():
	 return redirect('http://localhost/ajira/')
	
if __name__ == '__main__':
    app.run()
