import 'package:flutter/material.dart';
import 'package:supramental_flutter/api/api.dart';
import 'package:supramental_flutter/constants/color.dart';
import 'package:supramental_flutter/constants/string.dart';
import 'package:supramental_flutter/widget/kLoadingWidget.dart';
import 'package:supramental_flutter/ui/story/story_screen.dart';
import 'package:supramental_flutter/widget/languageBarWidget.dart';
import 'package:supramental_flutter/widget/nav-drawer.dart';

class IndexScreen extends StatefulWidget {
  @override
  _IndexScreenState createState() => _IndexScreenState();
  final int languageId;
  IndexScreen({Key key, this.languageId}) : super(key: key);
}

class _IndexScreenState extends State<IndexScreen> {
  Service _service = new Service();
  Map<String, dynamic> keywords = {};
  int language;
  int isFavPage;
  List languageArr = ["fr", "de", "en"];
  Future<Map<String, dynamic>> loadingData() async {
    keywords = await _service.getKeywords(language);
    return keywords;
  }

  @override
  void initState() {
    language = (widget.languageId == null) ? 0 : widget.languageId;
    super.initState();
  }

  Widget keywordsWidget(context) {
    var mq = MediaQuery.of(context).size;
    return FutureBuilder(
        future: loadingData(),
        builder: (context, AsyncSnapshot<Map<String, dynamic>> snapshot) {
          switch (snapshot.connectionState) {
            case ConnectionState.none:
            case ConnectionState.active:
            case ConnectionState.waiting:
              return Container(
                child: Center(
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.center,
                    crossAxisAlignment: CrossAxisAlignment.center,
                    children: [
                      SizedBox(
                        height: mq.height * 0.3,
                      ),
                      kLoadingWidget(context),
                    ],
                  ),
                ),
              );
            case ConnectionState.done:
            default:
              if (snapshot.hasError || snapshot.data == null) {
                return Container(
                  // color: Colors.white,
                  child: Center(
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      crossAxisAlignment: CrossAxisAlignment.center,
                      children: [
                        SizedBox(
                          height: mq.height * 0.3,
                        ),
                        kLoadingWidget(context),
                      ],
                    ),
                  ),
                );
              } else {
                return ListView.builder(
                    physics: NeverScrollableScrollPhysics(),
                    shrinkWrap: true,
                    scrollDirection: Axis.vertical,
                    itemCount: keywords.length,
                    itemBuilder: (BuildContext context, int index) {
                      String title = keywords.keys.elementAt(index);
                      List<dynamic> values = keywords.values.elementAt(index);
                      return Card(
                        color: themeLightColor,
                        child: Column(
                          children: <Widget>[
                            SizedBox(height: 10),
                            Text(
                              title,
                              style: TextStyle(
                                  color: Colors.black,
                                  fontWeight: FontWeight.bold,
                                  fontSize: 30),
                            ),
                            SizedBox(
                              height: 10,
                            ),
                            Column(
                                children: values
                                    .map((i) => new GestureDetector(
                                        onTap: () {
                                          Navigator.push(
                                            context,
                                            MaterialPageRoute(
                                              builder: (context) => StoryScreen(
                                                  keyword: i["a"],
                                                  language: language),
                                            ),
                                          );
                                        },
                                        child: new RichText(
                                          text: TextSpan(
                                            text: i["a"][0].toUpperCase(),
                                            style: TextStyle(
                                                fontWeight: FontWeight.bold,
                                                color: themeDarkColor,
                                                fontSize: 25),
                                            children: <TextSpan>[
                                              TextSpan(
                                                  text: i["a"].substring(1),
                                                  style: TextStyle(
                                                    fontSize: 20,
                                                    color: themeColor,
                                                  )),
                                            ],
                                          ),
                                        )))
                                    .toList()),
                            SizedBox(
                              height: 10,
                            ),
                          ],
                        ),
                      );
                    });
              }
          }
        });
  }

  @override
  Widget build(BuildContext context) {
    var mq = MediaQuery.of(context).size;
    return Scaffold(
      drawer: NavDrawerWidget(),
      appBar: new AppBar(
        backgroundColor: themeColor,
        // leading: new IconButton(
        //   icon: new Icon(
        //     Icons.arrow_back,
        //     color: Colors.white,
        //   ),
        //   onPressed: () => Navigator.of(context).pop(),
        // ),
        actions: <Widget>[
          LanguageBarWidget(
              lang: language,
              setLanguage: (int languageId) {
                setState(() {
                  language = languageId;
                });
              }),
        ],
      ),
      body: Center(
        child: Container(
          color: themeLightColor,
          child: Column(
            children: [
              Padding(
                padding: const EdgeInsets.fromLTRB(12, 25, 12, 25),
                child: Row(
                  children: [
                    Container(
                      width: mq.width * 0.6,
                      child: Column(
                        children: [
                          Text(
                            multiLanguage[languageArr[language]]["index_title"],
                            style: TextStyle(
                              fontSize: 22,
                              color: textColor,
                            ),
                          ),
                          SizedBox(
                            height: 20,
                          ),
                          Text(
                            multiLanguage[languageArr[language]]
                                ["index_description"],
                            textAlign: TextAlign.left,
                            style: TextStyle(
                              fontSize: 18,
                              color: textColor,
                            ),
                          ),
                        ],
                      ),
                    ),
                    Container(
                      width: mq.width * 0.27,
                      margin: const EdgeInsets.only(left: 20.0, right: 0.0),
                      child: Image.asset(
                        "assets/images/obsolette_neurone.png",
                        fit: BoxFit.fitWidth,
                      ),
                    ),
                  ],
                ),
              ),
              Expanded(
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
                    borderRadius: BorderRadius.only(
                      topRight: Radius.circular(20.0),
                      topLeft: Radius.circular(20.0),
                    ),
                  ),
                  child: Padding(
                    padding: const EdgeInsets.fromLTRB(25, 15, 25, 0),
                    child: SingleChildScrollView(
                      child: Column(
                        children: [
                          Container(
                            width: double.maxFinite,
                            child: keywordsWidget(context),
                          ),
                        ],
                      ),
                    ),
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
