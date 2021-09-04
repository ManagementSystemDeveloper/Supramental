import 'package:flutter/material.dart';
import 'package:supramental_flutter/api/api.dart';
import 'package:supramental_flutter/constants/color.dart';
import 'package:supramental_flutter/constants/string.dart';
import 'package:supramental_flutter/ui/dialog/dialog_screen.dart';
import 'package:supramental_flutter/ui/index/index_screen.dart';
import 'package:supramental_flutter/widget/kLoadingWidget.dart';
import 'package:supramental_flutter/widget/languageBarWidget.dart';
import 'package:supramental_flutter/widget/nav-drawer.dart';

class StoryScreen extends StatefulWidget {
  final String keyword;
  final int language;
  StoryScreen({Key key, this.keyword, this.language}) : super(key: key);
  @override
  _StoryScreenState createState() => _StoryScreenState();
}

class _StoryScreenState extends State<StoryScreen> {
  Service _service = new Service();
  Map<String, dynamic> story = {};
  int language;
  List languageArr = ["fr", "de", "en"];

  Future<Map<String, dynamic>> loadingData() async {
    story = await _service.getStory(widget.keyword, language);
    return story;
  }

  @override
  void initState() {
    language = widget.language;
    super.initState();
  }

  Widget themaWidget(context) {
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
                        height: mq.height * 0.2,
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
                  child: Center(
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      crossAxisAlignment: CrossAxisAlignment.center,
                      children: [
                        SizedBox(
                          height: mq.height * 0.2,
                        ),
                        kLoadingWidget(context),
                      ],
                    ),
                  ),
                );
              } else {
                if (story["status"] == "exist") {
                  return ListView.builder(
                      physics: NeverScrollableScrollPhysics(),
                      shrinkWrap: true,
                      scrollDirection: Axis.vertical,
                      itemCount: story["alire"].length,
                      itemBuilder: (BuildContext context, int index) {
                        String storyNo = story["alire"].keys.elementAt(index);
                        List<dynamic> titles =
                            story["alire"].values.elementAt(index);
                        return Card(
                          color: themeLightColor,
                          child: Padding(
                            padding: const EdgeInsets.fromLTRB(10, 0, 10, 0),
                            child: Column(
                              children: <Widget>[
                                SizedBox(
                                  height: 10,
                                ),
                                Column(children: [
                                  GestureDetector(
                                    onTap: () {
                                      Navigator.push(
                                        context,
                                        MaterialPageRoute(
                                          builder: (context) => DialogScreen(
                                              storyNo: storyNo,
                                              language: language),
                                        ),
                                      );
                                    },
                                    child: Text(
                                      titles[0],
                                      style: TextStyle(
                                          fontSize: 22,
                                          color: btnColor,
                                          fontWeight: FontWeight.bold),
                                    ),
                                  ),
                                  SizedBox(
                                    height: 20,
                                  ),
                                  Text(
                                    titles[1],
                                    textAlign: TextAlign.center,
                                    style: TextStyle(
                                      fontSize: 19,
                                      color: textColor,
                                    ),
                                  ),
                                ]),
                                SizedBox(
                                  height: 10,
                                ),
                              ],
                            ),
                          ),
                        );
                      });
                } else {
                  return Container(
                      child: Padding(
                    padding: const EdgeInsets.fromLTRB(20, 0, 20, 0),
                    child: Center(
                        child: Text(
                      story["alire"],
                      style: TextStyle(fontSize: 25, color: Colors.red),
                    )),
                  ));
                }
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
                // setState(() {
                //   language = languageId;
                // });
                Navigator.push(
                  context,
                  MaterialPageRoute(
                    builder: (context) => IndexScreen(languageId: languageId),
                  ),
                );
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
                            multiLanguage[languageArr[language]]["story_title"],
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
                                ["story_description"],
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
                    child: Column(
                      children: [
                        SingleChildScrollView(
                          child: Column(
                            children: [
                              Container(
                                width: double.maxFinite,
                                child: themaWidget(context),
                                height: mq.height * 0.45,
                              ),
                            ],
                          ),
                        ),
                        SizedBox(
                          height: 10,
                        ),
                        RaisedButton(
                          color: themeColor,
                          // shape: new RoundedRectangleBorder(
                          //   borderRadius: new BorderRadius.circular(5.0),
                          // ),
                          onPressed: () {
                            Navigator.push(
                              context,
                              MaterialPageRoute(
                                builder: (context) => IndexScreen(),
                              ),
                            );
                          },
                          child: Container(
                            height: 60,
                            width: mq.width * 0.7,
                            child: Center(
                              child: Text(
                                multiLanguage[languageArr[language]]
                                    ["back_keywords"],
                                style: TextStyle(
                                    fontSize: 25, color: Colors.white),
                              ),
                            ),
                          ),
                        ),
                      ],
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
