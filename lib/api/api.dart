import 'package:http/http.dart' as http;
import 'dart:convert' as convert;
import 'package:flutter_session/flutter_session.dart';

class Service {
  String apiUrl = 'https://obsolette.com/api';
  Future<Map<String, dynamic>> getKeywords(language) async {
    try {
      Map<String, dynamic> result;
      var response = await http.get(
        "$apiUrl/index.php?language=" + (language + 1).toString(),
        headers: {
          "accept": "application/json",
          "cache-control": "no-cache",
          "content-type": "application/json"
        },
      );
      if (response.statusCode == 200) {
        final body = convert.jsonDecode(response.body);
        result = body;
      }
      return result;
    } catch (err) {
      print(err);
      rethrow;
    }
  }

  Future<Map<String, dynamic>> getStory(keyword, language) async {
    try {
      Map<String, dynamic> result;

      var response = await http.get(
        "$apiUrl/thesaurus.php?language=" +
            (language + 1).toString() +
            "&&thema=" +
            keyword,
        headers: {
          "accept": "application/json",
          "cache-control": "no-cache",
          "content-type": "application/json"
        },
      );

      if (response.statusCode == 200) {
        final body = convert.jsonDecode(response.body);
        result = body;
      }
      return result;
    } catch (err) {
      rethrow;
    }
  }

  Future<Map<String, dynamic>> getFavourites() async {
    try {
      Map<String, dynamic> result;
      String email = await FlutterSession().get("email");
      if (email == null) email = "";
      var response = await http.get(
        "$apiUrl/get_favourites.php?email=" + email,
        headers: {
          "accept": "application/json",
          "cache-control": "no-cache",
          "content-type": "application/json"
        },
      );
      if (response.statusCode == 200) {
        final body = convert.jsonDecode(response.body);
        result = body;
      }
      return result;
    } catch (err) {
      rethrow;
    }
  }

  Future<String> setFavourite(storyNo) async {
    try {
      String result;
      String email = await FlutterSession().get("email");
      var response = await http.get(
        "$apiUrl/favourite.php?storyNo=" +
            storyNo.toString() +
            "&&email=" +
            email,
        headers: {
          "accept": "application/json",
          "cache-control": "no-cache",
          "content-type": "application/json"
        },
      );

      if (response.statusCode == 200) {
        final body = convert.jsonDecode(response.body);
        result = body["id"];
      }
      return result;
    } catch (err) {
      rethrow;
    }
  }

  Future<String> login(email, password) async {
    try {
      String result;
      await FlutterSession().set("email", email);
      var response = await http.get(
        "$apiUrl/login.php?email=" +
            email.toString() +
            "&&password=" +
            password,
        headers: {
          "accept": "application/json",
          "cache-control": "no-cache",
          "content-type": "application/json"
        },
      );

      if (response.statusCode == 200) {
        final body = convert.jsonDecode(response.body);
        result = body["result"];
        if (result == "success") {
          await FlutterSession().set("email", email);
        }
      }
      return result;
    } catch (err) {
      rethrow;
    }
  }

  Future<String> register(email, password) async {
    try {
      String result;
      await FlutterSession().set("email", email);
      var response = await http.get(
        "$apiUrl/register.php?email=" +
            email.toString() +
            "&&password=" +
            password,
        headers: {
          "accept": "application/json",
          "cache-control": "no-cache",
          "content-type": "application/json"
        },
      );

      if (response.statusCode == 200) {
        final body = convert.jsonDecode(response.body);
        result = body["result"];
      }
      return result;
    } catch (err) {
      rethrow;
    }
  }

  Future<String> removeFavourite(favouriteId) async {
    try {
      String result;

      var response = await http.get(
        "$apiUrl/remove_favourite.php?favouriteId=" + favouriteId.toString(),
        headers: {
          "accept": "application/json",
          "cache-control": "no-cache",
          "content-type": "application/json"
        },
      );

      if (response.statusCode == 200) {
        final body = convert.jsonDecode(response.body);
        result = body["status"];
        print(body);
      }
      return result;
    } catch (err) {
      rethrow;
    }
  }

  Future<Map<String, dynamic>> getDialog(storyNo, language) async {
    try {
      Map<String, dynamic> result;

      var response = await http.get(
        "$apiUrl/dialog.php?language=" +
            (language + 1).toString() +
            "&&story=" +
            storyNo,
        headers: {
          "accept": "application/json",
          "cache-control": "no-cache",
          "content-type": "application/json"
        },
      );

      if (response.statusCode == 200) {
        final body = convert.jsonDecode(response.body);
        result = body;
      }
      return result;
    } catch (err) {
      rethrow;
    }
  }
}
