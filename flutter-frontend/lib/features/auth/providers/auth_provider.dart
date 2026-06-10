import 'package:flutter_riverpod/flutter_riverpod.dart';
import '../repositories/auth_repository.dart';
import '../../../core/storage/secure_storage_service.dart';
import '../models/user_model.dart';

final authStateProvider = StateNotifierProvider<AuthNotifier, AsyncValue<UserModel?>>((ref) {
  final repo = ref.watch(authRepositoryProvider);
  final storage = ref.watch(secureStorageProvider);
  return AuthNotifier(repo, storage);
});

class AuthNotifier extends StateNotifier<AsyncValue<UserModel?>> {
  final AuthRepository _repo;
  final SecureStorageService _storage;

  AuthNotifier(this._repo, this._storage) : super(const AsyncValue.data(null));

  Future<void> login(String emailOrMobile, String password) async {
    state = const AsyncValue.loading();
    try {
      final data = await _repo.login(emailOrMobile, password);
      final user = UserModel.fromJson(data['data']['user']);
      final token = data['data']['token'];
      
      await _storage.saveToken(token);
      state = AsyncValue.data(user);
    } catch (e, st) {
      state = AsyncValue.error(e, st);
    }
  }

  Future<void> register({
    required String name,
    required String email,
    required String mobile,
    required String password,
    required String role,
  }) async {
    state = const AsyncValue.loading();
    try {
      final data = await _repo.register(
        name: name,
        email: email,
        mobile: mobile,
        password: password,
        role: role,
      );
      final user = UserModel.fromJson(data['data']['user']);
      state = AsyncValue.data(user);
    } catch (e, st) {
      state = AsyncValue.error(e, st);
    }
  }

  Future<void> logout() async {
    try {
      await _repo.logout();
    } finally {
      await _storage.deleteToken();
      state = const AsyncValue.data(null);
    }
  }
}
