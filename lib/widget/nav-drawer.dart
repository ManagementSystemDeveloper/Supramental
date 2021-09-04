import 'package:flutter/material.dart';
import 'package:supramental_flutter/constants/color.dart';
import 'package:flutter_session/flutter_session.dart';
import 'package:supramental_flutter/ui/favourite/favourite_screen.dart';
import 'package:supramental_flutter/ui/index/index_screen.dart';
import 'package:supramental_flutter/ui/login/login_screen.dart';

class NavDrawerWidget extends StatefulWidget {
  NavDrawerWidget({Key key}) : super(key: key);

  @override
  _NavDrawerWidgetState createState() => _NavDrawerWidgetState();
}

class _NavDrawerWidgetState extends State<NavDrawerWidget> {
  String email;
  getEmail() async {
    String value = await FlutterSession().get("email");
    email = "";
    setState(() {
      email = value;
    });
  }

  @override
  void initState() {
    getEmail();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Drawer(
      child: ListView(
        padding: EdgeInsets.zero,
        children: <Widget>[
          DrawerHeader(
            child: Column(
              children: [
                Center(
                  child: Container(
                    width: 100,
                    height: 100,
                    child: ClipRRect(
                        borderRadius: BorderRadius.circular(50),
                        child: Image.asset(
                          'assets/images/user.png',
                          fit: BoxFit.fitWidth,
                        )),
                  ),
                ),
                SizedBox(
                  height: 10,
                ),
                Center(
                  child: Text(
                    (email != null) ? email : "",
                    style: TextStyle(color: themeColor, fontSize: 20),
                  ),
                ),
              ],
            ),
          ),
          ListTile(
            leading: Icon(Icons.home),
            title: Text('Home'),
            onTap: () => {
              Navigator.push(
                context,
                MaterialPageRoute(
                  builder: (context) => IndexScreen(),
                ),
              )
            },
          ),
          ListTile(
            leading: Icon(Icons.favorite_border),
            title: Text('Favourite'),
            onTap: () => {
              Navigator.push(
                context,
                MaterialPageRoute(
                  builder: (context) => FavouriteScreen(),
                ),
              )
            },
          ),
          ListTile(
            leading: Icon(Icons.exit_to_app),
            title: Text('Logout'),
            onTap: () async => {
              await FlutterSession().set("email", ""),
              Navigator.push(
                context,
                MaterialPageRoute(
                  builder: (context) => LoginScreen(),
                ),
              )
            },
          ),
        ],
      ),
    );
  }
}
