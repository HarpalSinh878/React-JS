
class GroupStateModel{

  bool groupStatus;
  String exceptions;

  GroupStateModel({
    required this.groupStatus,
    required this.exceptions,
  });

  factory GroupStateModel.fromJson(Map<String, dynamic> json) => GroupStateModel(
    groupStatus: json["groupStatus"],
    exceptions: json["exceptions"],
  );

  Map<String, dynamic> toJson() => {
    "groupStatus": groupStatus,
    "exceptions": exceptions,
  };
}

