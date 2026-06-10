import '../../../core/network/api_client.dart';
import '../../../core/constants/api_constants.dart';
import '../models/user_model.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';

final authRepositoryProvider = Provider<AuthRepository>((ref) {
  final client = ref.watch(apiClientProvider);
  return AuthRepository(client);
});

class AuthRepository {
  final ApiClient _client;

  AuthRepository(this._client);

  Future<Map<String, dynamic>> login(String emailOrMobile, String password) async {
    final response = await _client.post(ApiConstants.login, data: {
      'email_or_mobile': emailOrMobile,
      'password': password,
    });
    return response.data;
  }

  Future<Map<String, dynamic>> register({
    required String name,
    required String email,
    required String mobile,
    required String password,
    required String role,
  }) async {
    final response = await _client.post(ApiConstants.register, data: {
      'name': name,
      'email': email,
      'mobile': mobile,
      'password': password,
      'role': role,
    });
    return response.data;
  }

  Future<bool> verifyOtp(String key, String otp) async {
    final response = await _client.post(ApiConstants.verifyOtp, data: {
      'email_or_mobile': key,
      'otp': otp,
    });
    return response.data['success'] ?? false;
  }

  Future<void> logout() async {
    await _client.post(ApiConstants.logout);
  }
}
