import pymysql
from app import app
from db_config import mysql
from flask import jsonify
from flask import flash, request
import datetime
import random

def not_found():
    return {'error':'data not found'}

@app.route('/get_date',methods=['GET'])
def get_date():
    try:
        conn = mysql.connect()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        cursor.execute("SELECT DISTINCT date FROM attendance")
        empRows = cursor.fetchall()
        respone = jsonify(empRows)
        respone.status_code = 200
        return respone
    except Exception as e:
        print(e)
    finally:
        cursor.close()
        conn.close()

        

@app.route('/get_attendance/<date>',methods=['GET'])
def get_attendance(date):
    try:
        conn = mysql.connect()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        cursor.execute("SELECT attendance.register_no, attendance.class, attendance.attendance, student.student_name FROM attendance INNER JOIN student ON attendance.register_no = student.register_no WHERE attendance.date = '{}'".format(date))
        empRows = cursor.fetchall()
        respone = jsonify(empRows)
        respone.status_code = 200
        return respone
    except Exception as e:
        print(e)
    finally:
        cursor.close()
        conn.close()


@app.route('/add_class', methods=['POST'])
def add_class():
    try:
        _json = request.json
        _class_name = _json['class_name']

        if _class_name and request.method == 'POST':
            sqlQuery = "SELECT * FROM class WHERE class_name = '{}'".format(_class_name)
            conn = mysql.connect()
            cursor = conn.cursor()
            cursor.execute(sqlQuery)
            count = cursor.rowcount
            if count>0:
                conn.commit()
                respone = jsonify('Class already existing!')
                respone.status_code = 200
                return respone
            else:
                sqlQuery = "INSERT INTO class(class_name) VALUES(%s)"
                bindData = (_class_name)
                cursor.execute(sqlQuery, bindData)
                conn.commit()
                respone = jsonify('Class added successfully!')
                respone.status_code = 200
                return respone
        else:
            return not_found()
    except Exception as e:
                print(e)
    finally:
        cursor.close()
        conn.close()
        

@app.route('/get_class', methods=['GET'])
def get_class():
    try:
        conn = mysql.connect()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        cursor.execute("SELECT class_name FROM class")
        empRows = cursor.fetchall()
        respone = jsonify(empRows)
        respone.status_code = 200
        return respone
    except Exception as e:
        print(e)
    finally:
        cursor.close()
        conn.close()


@app.route('/delete_class', methods=['POST'])
def delete_class():
    try:
        _json = request.json
        _class_name = _json['class_name']

        if _class_name and request.method == 'POST':
            sqlQuery = "DELETE class, student FROM class INNER JOIN student ON class.class_name = student.class WHERE class.class_name = (%s)"
            bindData = (_class_name)
            conn = mysql.connect()
            cursor = conn.cursor()
            cursor.execute(sqlQuery, bindData)
            conn.commit()
            respone = jsonify('Class deleted successfully!')
            respone.status_code = 200
            return respone
        else:
            return not_found()
    except Exception as e:
                print(e)
    finally:
        cursor.close()
        conn.close()

@app.route('/delete_student',methods=['POST'])
def delete_student():
    try:
        _json = request.json
        _regno = _json['rollno']

        if _regno and request.method == 'POST':
            sqlQuery = "DELETE student, attendance FROM student INNER JOIN attendance ON student.register_no = attendance.register_no WHERE student.register_no = (%s)"
            binddata = (_regno)
            conn = mysql.connect()
            cursor = conn.cursor()
            cursor.execute(sqlQuery, binddata)
            conn.commit()
            respone = jsonify('Student deleted successfully!')
            respone.status_code = 200
            return respone
        else:
            return not_found()
    except Exception as e:
        print(e)
    finally:
        cursor.close()
        conn.close()

@app.route('/get_query',methods=['GET'])
def get_query():
    try:
        conn = mysql.connect()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        cursor.execute("SELECT * FROM admin ORDER BY date DESC")
        empRows = cursor.fetchall()
        respone = jsonify(empRows)
        respone.status_code = 200
        return respone
    except Exception as e:
        print(e)
    finally:
        cursor.close()
        conn.close



@app.route('/pending_query_count',methods=['GET'])
def query_count():
    try:
        conn = mysql.connect()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        cursor.execute("SELECT COUNT(*) as count FROM admin WHERE status = 0")
        empRows = cursor.fetchall()
        respone = jsonify(empRows)
        respone.status_code = 200
        return respone
    except Exception as e:
        print(e)
    finally:
        cursor.close()
        conn.close


@app.route('/resolve_query',methods=['PATCH'])
def resolve_query():
    try:
        _json = request.json
        _query_id = _json['query_id']

        if _query_id and request.method == 'PATCH':
            sqlQuery = "UPDATE admin SET status = 1 WHERE query_id = (%s)"
            binddata = (_query_id)
            conn = mysql.connect()
            cursor = conn.cursor()
            cursor.execute(sqlQuery, binddata)
            conn.commit()
            respone = jsonify('Query resolved successfully!')
            respone.status_code = 200
            return respone
        else:
            return not_found()
    except Exception as e:
        print(e)
    finally:
        cursor.close()
        conn.close()

    
@app.route('/add_staff',methods=['POST'])
def add_staff():
    try:
        _json = request.json
        _staff_name = _json['staff_name']
        _staff_id = _json['staff_id']

        if _staff_id and _staff_name and request.method == 'POST':

            sqlQuery = "SELECT * FROM staff WHERE staff_id = '{}'".format(_staff_id)
            conn = mysql.connect()
            cursor = conn.cursor()
            cursor.execute(sqlQuery)
            count = cursor.rowcount
            if count>0:
                conn.commit()
                respone = jsonify('Staff already existing!')
            else:
                sqlQuery = "INSERT INTO staff(staff_id, staff_name) VALUES(%s, %s)"
                binddata = (_staff_id, _staff_name.title())
                conn = mysql.connect()
                cursor = conn.cursor()
                cursor.execute(sqlQuery, binddata)
                conn.commit()
                respone = jsonify('Staff Added successfully!')
            respone.status_code = 200
            return respone
        else:
            return not_found()
    except Exception as e:
        print(e)
    finally:
        cursor.close()
        conn.close()


@app.route('/delete_staff',methods=['POST'])
def delete_staff():
    try:
        _json = request.json
        _staff_id = _json['staff_id']

        if _staff_id and request.method == 'POST':
            sqlQuery = "DELETE FROM staff WHERE staff_id = (%s)"
            binddata = (_staff_id)
            conn = mysql.connect()
            cursor = conn.cursor()
            cursor.execute(sqlQuery, binddata)
            conn.commit()
            respone = jsonify('Staff deleted successfully!')
            respone.status_code = 200
            return respone
        else:
            return not_found()
    except Exception as e:
        print(e)
    finally:
        cursor.close()
        conn.close()


