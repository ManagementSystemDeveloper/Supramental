import 'package:flutter/material.dart';
import 'package:supramental_flutter/constants/color.dart';
// import 'package:supramental_flutter/ui/favourite/favourite_screen.dart';

class LanguageBarWidget extends StatefulWidget {
  final int lang;
  final int languageId;
  final int isFavPage;
  final Function(int) setLanguage;
  LanguageBarWidget(
      {Key key,
      this.lang,
      this.isFavPage,
      @required this.setLanguage,
      this.languageId})
      : super(key: key);

  @override
  _LanguageBarWidgetState createState() => _LanguageBarWidgetState();
}

class _LanguageBarWidgetState extends State<LanguageBarWidget> {
  int language;
  int favPage;
  List languageArr = ["fr", "de", "en"];

  @override
  void initState() {
    language = widget.lang;
    favPage = (widget.isFavPage == null) ? 0 : widget.isFavPage;
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.fromLTRB(10, 0, 10, 0),
      child: Center(
        child: Container(
          child: Row(
            children: [
              // SizedBox(
              //   width: 45,
              //   child: MaterialButton(
              //     shape: CircleBorder(),
              //     child: Icon(
              //       (favPage == 0) ? Icons.favorite_border : Icons.favorite,
              //       size: 40,
              //       color: Colors.white,
              //     ),
              //     padding: EdgeInsets.all(0),
              //     onPressed: () {
              //       setState(() {
              //         favPage = 1;
              //       });
              //       Navigator.push(
              //         context,
              //         MaterialPageRoute(
              //           builder: (context) => FavouriteScreen(),
              //         ),
              //       );
              //     },
              //   ),
              // ),
              SizedBox(
                width: 45,
                child: MaterialButton(
                  shape: CircleBorder(
                    side: BorderSide(
                      width: 2,
                      color: Colors.white,
                      style: BorderStyle.solid,
                    ),
                  ),
                  child: Text(
                    "FR",
                    style: TextStyle(fontSize: 16),
                  ),
                  color: (language == 0) ? Colors.white : themeColor,
                  textColor: (language == 0) ? themeColor : Colors.white,
                  padding: EdgeInsets.all(10),
                  onPressed: () {
                    widget.setLanguage(0);
                    setState(() {
                      language = 0;
                      favPage = 0;
                    });
                  },
                ),
              ),
              SizedBox(
                width: 45,
                child: MaterialButton(
                  shape: CircleBorder(
                      side: BorderSide(
                          width: 2,
                          color: Colors.white,
                          style: BorderStyle.solid)),
                  child: Text(
                    "DE",
                    style: TextStyle(fontSize: 16),
                  ),
                  color: (language == 1) ? Colors.white : themeColor,
                  textColor: (language == 1) ? themeColor : Colors.white,
                  padding: EdgeInsets.all(10),
                  onPressed: () {
                    widget.setLanguage(1);
                    setState(() {
                      language = 1;
                      favPage = 0;
                    });
                  },
                ),
              ),
              SizedBox(
                width: 50,
                child: MaterialButton(
                  shape: CircleBorder(
                      side: BorderSide(
                          width: 2,
                          color: Colors.white,
                          style: BorderStyle.solid)),
                  child: Text(
                    "EN",
                    style: TextStyle(fontSize: 16),
                  ),
                  color: (language == 2) ? Colors.white : themeColor,
                  textColor: (language == 2) ? themeColor : Colors.white,
                  padding: EdgeInsets.all(10),
                  onPressed: () {
                    widget.setLanguage(2);
                    setState(() {
                      language = 2;
                      favPage = 0;
                    });
                  },
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
