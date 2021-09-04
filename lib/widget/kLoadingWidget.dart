import 'package:flutter/material.dart';
import 'package:flutter_spinkit/flutter_spinkit.dart';

Widget kLoadingWidget(context) => Center(
      child: SpinKitFadingCube(
        color: Colors.white,
        size: 50.0,
      ),
    );
