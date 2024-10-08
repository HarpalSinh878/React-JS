import 'package:flutter/material.dart';

class ProgressDialog extends StatelessWidget{
  String message;
  ProgressDialog({this.message});
  @override
  Widget build(BuildContext context) {
    // TODO: implement build
    return Dialog(
      backgroundColor: Colors.red,
      child: Container(
        margin: EdgeInsets.all(15.0),
         child: Padding(
           padding: const EdgeInsets.all(8.0),
           child: Row(
             children: [
               SizedBox(width: 6.0,),
               CircularProgressIndicator( valueColor:AlwaysStoppedAnimation<Color>(Colors.black),)
              , SizedBox(width: 26.0,)
               ,Text(message,style: TextStyle(color: Colors.black
               ,fontSize: 12),)
             ],
           ),
         ),
      ),
    );
  }

}