
class RelayStatesModel {
  RelayStatesModel({
    required this.relayStateIncoming,
    required this.relayBoard,
    required this.serialNumber,
  });

  RelayStateIncoming relayStateIncoming;
  String relayBoard;
  String serialNumber;

  factory RelayStatesModel.fromJson(Map<String, dynamic> json) => RelayStatesModel(
    relayStateIncoming: RelayStateIncoming.fromJson(json["relayStateIncoming"]),
    relayBoard: json["relayBoard"],
    serialNumber: json["serialNumber"],
  );

  Map<String, dynamic> toJson() => {
    "relayStateIncoming": relayStateIncoming.toJson(),
    "relayBoard": relayBoard,
    "serialNumber": serialNumber,
  };
}

class RelayStateIncoming {
  RelayStateIncoming({
    required this.hexString,
    required this.parseError,
    required this.checksumError,
    required this.states,
    required this.binaryString,
  });

  String hexString;
  bool parseError;
  bool checksumError;
  Map<String, bool> states;
  String binaryString;

  factory RelayStateIncoming.fromJson(Map<String, dynamic> json) => RelayStateIncoming(
    hexString: json["hexString"],
    parseError: json["parseError"],
    checksumError: json["checksumError"],
    states: Map.from(json["states"]).map((k, v) => MapEntry<String, bool>(k, v)),
    binaryString: json["binaryString"],
  );

  Map<String, dynamic> toJson() => {
    "hexString": hexString,
    "parseError": parseError,
    "checksumError": checksumError,
    "states": Map.from(states).map((k, v) => MapEntry<String, dynamic>(k, v)),
    "binaryString": binaryString,
  };
}
