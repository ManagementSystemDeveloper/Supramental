import 'package:flutter/material.dart';
import 'package:form_field_validator/form_field_validator.dart';
import 'package:supramental_flutter/constants/color.dart';
import 'package:supramental_flutter/ui/login/login_screen.dart';
import 'package:supramental_flutter/api/api.dart';
import 'package:fluttertoast/fluttertoast.dart';

class RegisterScreen extends StatefulWidget {
  @override
  _RegisterScreenState createState() => _RegisterScreenState();
}

class _RegisterScreenState extends State<RegisterScreen> {
  TextEditingController emailController = TextEditingController();
  TextEditingController passwordController = TextEditingController();
  TextEditingController confirmPasswordController = TextEditingController();

  GlobalKey<FormState> formkey = GlobalKey<FormState>();

  Service _service = new Service();

  String password;
  @override
  void initState() {
    super.initState();
  }

  void showMessage(result) {
    Fluttertoast.showToast(
        msg: result,
        toastLength: Toast.LENGTH_LONG,
        gravity: ToastGravity.BOTTOM,
        backgroundColor: Colors.red,
        textColor: Colors.white,
        timeInSecForIos: 1);
  }

  @override
  Widget build(BuildContext context) {
    var mq = MediaQuery.of(context).size;
    return Scaffold(
      backgroundColor: Colors.white,
      body: Center(
        child: Container(
            decoration: BoxDecoration(
              gradient: LinearGradient(
                begin: Alignment.topRight,
                end: Alignment.bottomLeft,
                colors: [
                  themeColor,
                  Colors.white,
                ],
              ),
            ),
            child: Form(
              autovalidateMode: AutovalidateMode.always,
              key: formkey,
              child: Padding(
                  padding: EdgeInsets.all(10),
                  child: ListView(
                    children: <Widget>[
                      SizedBox(
                        height: mq.height * 0.15,
                      ),
                      Center(
                        child: Container(
                          padding: EdgeInsets.all(10),
                          width: mq.width * 0.6,
                          child: Image.asset(
                            'assets/images/obsolette_logo.png',
                            fit: BoxFit.fitWidth,
                          ),
                        ),
                      ),
                      SizedBox(
                        height: mq.height * 0.05,
                      ),
                      Container(
                        padding: EdgeInsets.all(10),
                        child: TextFormField(
                          validator: MultiValidator([
                            RequiredValidator(errorText: "* Required"),
                            EmailValidator(errorText: "Enter valid format")
                          ]),
                          controller: emailController,
                          decoration: InputDecoration(
                            border: OutlineInputBorder(),
                            labelText: 'User Email',
                          ),
                        ),
                      ),
                      Container(
                        padding: EdgeInsets.fromLTRB(10, 10, 10, 0),
                        child: TextFormField(
                          onChanged: (val) => password = val,
                          validator: MultiValidator([
                            RequiredValidator(errorText: "* Required"),
                            MinLengthValidator(6,
                                errorText:
                                    "Password should be at least 6 characters")
                          ]),
                          obscureText: true,
                          controller: passwordController,
                          decoration: InputDecoration(
                            border: OutlineInputBorder(),
                            labelText: 'Password',
                          ),
                        ),
                      ),
                      Container(
                        padding: EdgeInsets.fromLTRB(10, 10, 10, 0),
                        child: TextFormField(
                          validator: (val) => MatchValidator(
                                  errorText: "Password does not match")
                              .validateMatch(val, password),
                          obscureText: true,
                          controller: confirmPasswordController,
                          decoration: InputDecoration(
                            border: OutlineInputBorder(),
                            labelText: 'Confirm Password',
                          ),
                        ),
                      ),
                      SizedBox(
                        height: 20,
                      ),
                      Container(
                          height: 50,
                          padding: EdgeInsets.fromLTRB(10, 0, 10, 0),
                          child: RaisedButton(
                            textColor: Colors.white,
                            color: themeColor,
                            child: Text(
                              'Sign Up',
                              style: TextStyle(fontSize: 20),
                            ),
                            onPressed: () async {
                              if (formkey.currentState.validate()) {
                                String result = await _service.register(
                                    emailController.text,
                                    passwordController.text);
                                showMessage(result);
                                if (result == "success") {
                                  Navigator.push(
                                    context,
                                    MaterialPageRoute(
                                      builder: (context) => LoginScreen(),
                                    ),
                                  );
                                }
                              }
                            },
                          )),
                      Container(
                          child: Row(
                        children: <Widget>[
                          Text(
                            'Already have account?',
                            style: TextStyle(fontSize: 18),
                          ),
                          FlatButton(
                            textColor: Colors.blue,
                            child: Text(
                              'Sign In',
                              style: TextStyle(fontSize: 20, color: textColor),
                            ),
                            onPressed: () {
                              Navigator.push(
                                context,
                                MaterialPageRoute(
                                  builder: (context) => LoginScreen(),
                                ),
                              );
                            },
                          )
                        ],
                        mainAxisAlignment: MainAxisAlignment.center,
                      ))
                    ],
                  )),
            )),
      ),
    );
  }
}
