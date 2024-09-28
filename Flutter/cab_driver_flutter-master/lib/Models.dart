class Predictions{
  String pleces_id;
  String main_text;
  String secondary_text;
  Predictions({this.main_text,this.pleces_id,this.secondary_text});
  factory Predictions.fromjson(Map<String,dynamic>map){
    return Predictions(
       main_text: map["structured_formatting"]["main_text"],
       secondary_text: map["structured_formatting"]["secondary_text"],
      pleces_id: map["place_id"],
    );
  }
}
