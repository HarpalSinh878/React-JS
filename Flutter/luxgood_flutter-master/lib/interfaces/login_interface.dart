import 'package:luxgood/models/loginModel.dart';

abstract class ILogin {
  Future<LoginModel?> login(String email, String password);
  Future<LoginModel?> loginNew(String email, String password);
}
