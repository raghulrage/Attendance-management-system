import pymysql
from app import app
from db_config import mysql
from flask import jsonify
from flask import flash, request
import datetime

def not_found():
    return {'error':'data not found'}

@app.route('/add', methods=['POST'])
def add_student():
    try:
        _json = request.json
        _regno = _json['register_no']
        _name = _json['student_name']
        _class = _json['class']
        
        if _name and _regno and _class and request.method == 'POST':
            sqlQuery = "SELECT * FROM student WHERE register_no = '{}'".format(_regno)
            conn = mysql.connect()
            cursor = conn.cursor()
            cursor.execute(sqlQuery)
            count = cursor.rowcount
            if count>0:
                conn.commit()
                respone = jsonify('Student already existing!')
            else:
                sqlQuery = "INSERT INTO student(register_no, student_name, class) VALUES(%s, %s, %s)"
                bindData = (_regno, _name.title(), _class)
                conn = mysql.connect()
                cursor = conn.cursor()
                cursor.execute(sqlQuery, bindData)
                conn.commit()
                respone = jsonify('Student added successfully!')
            respone.status_code = 200
            return respone
        else:
            return not_found()
    except Exception as e:
                print(e)
    finally:
        cursor.close()
        conn.close()


@app.route('/get_students/<cls>', methods=['GET'])
def students(cls):
    try:
        cls = str(cls)
        conn = mysql.connect()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        cursor.execute("SELECT register_no, student_name FROM student WHERE class = '{}' ORDER BY student_name ASC".format(cls))
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


@app.route('/attendance', methods=['POST'])
def add_attendance():
    try:
        _json = request.json
        _regno = _json['register_no']
        _attendance = _json['attendance']
        cls = _json['cls']
        now = datetime.datetime.now()
        _date = '-'.join(list(map(str,[now.day,now.month,now.year])))
        print(_date)
        print(_regno,_attendance,cls)
        if _attendance and _regno and request.method == 'POST':
            for reg, att in zip(_regno,_attendance):
                if att == 'A' :att = 'Absent'
                if att == 'P' :att = 'Present'
                sqlQuery = "INSERT INTO attendance(register_no, class, attendance, date) VALUES(%s, %s, %s, %s)"
                bindData = (reg, cls, att, _date)
                conn = mysql.connect()
                cursor = conn.cursor()
                cursor.execute(sqlQuery, bindData)
                conn.commit()
            respone = jsonify('Attendance updated successfully!')
            respone.status_code = 200
            return respone
        else:
            return not_found()
    except Exception as e:
                print(e)
    finally:
        cursor.close()
        conn.close()


@app.route('/add_query',methods=['POST'])
def add_query():
    try:
        _json = request.json
        staff_name = _json['staff_id']
        query = _json['query']
        print(query,staff_name)
        if staff_name and query and request.method == 'POST':
            sqlQuery = "INSERT INTO admin(query, staff) VALUES (%s,%s)"
            binddata = (query,staff_name)
            conn = mysql.connect()
            cursor = conn.cursor()
            cursor.execute(sqlQuery, binddata)
            conn.commit()
            respone = jsonify('Query added successfully!')
            respone.status_code = 200
            return respone
        else:
            return not_found()
    except Exception as e:
        print(e)
    finally:
        cursor.close()
        conn.close()

@app.route('/login_staff',methods=['POST'])
def login_staff():
    try:
        _json = request.json
        staff_id = _json['staff_id']
        print(staff_id)
        if staff_id and request.method == 'POST':
            sqlQuery = "SELECT COUNT(*) as count FROM staff WHERE staff_id = '{}'".format(staff_id)
            conn = mysql.connect()
            cursor = conn.cursor()
            cursor.execute(sqlQuery)
            empRows = cursor.fetchall()
            respone = jsonify(empRows)
            respone.status_code = 200
            return respone
        else:
            return not_found()
    except Exception as e:
        print(e)
    finally:
        cursor.close()
        conn.close()

@app.route('/get_staff_info/<staff_id>',methods=['GET'])
def get_staff_info(staff_id):
    try:
        if staff_id and request.method == 'GET':
            sqlQuery = "SELECT * FROM staff WHERE staff_id = '{}'".format(staff_id)
            conn = mysql.connect()
            cursor = conn.cursor(pymysql.cursors.DictCursor)
            cursor.execute(sqlQuery)
            empRows = cursor.fetchall()
            respone = jsonify(empRows)
            respone.status_code = 200
            return respone
        else:
            return not_found()
    except Exception as e:
        print(e)
    finally:
        cursor.close()
        conn.close()
