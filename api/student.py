import pymysql
from app import app
from db_config import mysql
from flask import jsonify
from flask import flash, request
import datetime


@app.route('/student_login/<reg>', methods=['POST'])
def students_login(reg):
    try:
        conn = mysql.connect()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        cursor.execute("SELECT register_no FROM student WHERE register_no = '{}'".format(reg))
        empRows = cursor.fetchall()
        count = cursor.rowcount   
        if not count:
            respone = jsonify(str(count))
        else:
            respone = jsonify('Sudent Login successful!!')
        print(respone)
        respone.status_code = 200
        return respone
    except Exception as e:
        print(e)
    finally:
        cursor.close()
        conn.close()



@app.route('/get_student_attendance/<regno>',methods=['GET'])
def get_student_attendence(regno):
    try:
        regno = str(regno)
        conn = mysql.connect()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        print(regno)
        cursor.execute("SELECT date , attendance FROM attendance WHERE register_no = '{}'".format(regno))
        empRows = cursor.fetchall()
        count = cursor.rowcount
        if count == 0:
            respone = jsonify(count)
        else:
            respone = jsonify(empRows)
        respone.status_code = 200
        return respone
    except Exception as e:
        print(e)
    finally:
        cursor.close()
        conn.close()



@app.route('/get_student_details/<regno>',methods=['GET'])
def get_student_details(regno):
    try:
        conn = mysql.connect()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        cursor.execute("SELECT * FROM student WHERE register_no = '{}'".format(regno))
        empRows = cursor.fetchall()
        count = cursor.rowcount
        respone = jsonify(empRows)
        if count==0:
            respone = jsonify(count)
        respone.status_code = 200
        print(respone)
        return respone
    except Exception as e:
        print(e)
    finally:
        cursor.close()
        conn.close()
