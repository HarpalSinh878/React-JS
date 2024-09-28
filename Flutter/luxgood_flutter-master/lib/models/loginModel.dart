class LoginModel{

  LoginModel({
  required this.authenticationKey,
  required this.tokenExpirationDate,
  required this.userId,
  required this.totp,
  });

  String authenticationKey;
  DateTime tokenExpirationDate;
  String userId;
  bool totp;

  factory LoginModel.fromJson(Map<String, dynamic> json) => LoginModel(
  authenticationKey: json["authenticationKey"],
  tokenExpirationDate: DateTime.parse(json["tokenExpirationDate"]),
  userId: json["userId"],
  totp: json["totp"],
  );

  Map<String, dynamic> toJson() => {
  "authenticationKey": authenticationKey,
  "tokenExpirationDate": tokenExpirationDate.toIso8601String(),
  "userId": userId,
  "totp": totp,
  };
  }