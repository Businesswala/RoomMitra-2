class UserModel {
  final String id;
  final String role;
  final String name;
  final String email;
  final String mobile;
  final String? profileImage;
  final String? gender;
  final String? bio;

  UserModel({
    required this.id,
    required this.role,
    required this.name,
    required this.email,
    required this.mobile,
    this.profileImage,
    this.gender,
    this.bio,
  });

  factory UserModel.fromJson(Map<String, dynamic> json) {
    final profile = json['profile'] ?? {};
    return UserModel(
      id: json['id'],
      role: json['role'] ?? 'user',
      name: json['name'],
      email: json['email'],
      mobile: json['mobile'],
      profileImage: profile['profile_image'],
      gender: profile['gender'],
      bio: profile['bio'],
    );
  }
}
