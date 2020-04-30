from flask import Flask
from flask_cors import CORS


app = Flask(__name__, static_url_path='')
CORS(app)
cors = CORS(app , resources = {
    r"/*":{
        "Access-Control-Allow-Origin":"*",
        "Access-Control-Allow-Headers":"Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With",
        "Access-Control-Allow-Methods":"POST",
        "Access-Control-Max-Age":"3600"}
    })
