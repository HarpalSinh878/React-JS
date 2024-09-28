class RelayBoardModel {
  String id;

  RelayBoardModel({required this.id});

  factory RelayBoardModel.fromJson(Map<String, dynamic> json) =>
      RelayBoardModel(id: json['id'] ?? "");

  Map<String, dynamic> toJson() => {
        "id": id,
      };

  static List<RelayBoardModel> getListFromJson(List<dynamic> list) {
    List<RelayBoardModel> unitList = [];
    list.forEach((unit) => unitList.add(RelayBoardModel.fromJson(unit)));
    return unitList;
  }
}
