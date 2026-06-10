class ApiConstants {
  static const String baseUrl = 'http://localhost:8000/api/v1'; // Map to staging URL for production
  
  // Auth endpoints
  static const String register = '/auth/register';
  static const String login = '/auth/login';
  static const String logout = '/auth/logout';
  static const String verifyOtp = '/auth/verify-otp';
  static const String resendOtp = '/auth/resend-otp';
  static const String forgotPassword = '/auth/forgot-password';
  static const String resetPassword = '/auth/reset-password';
  static const String googleLogin = '/auth/google';

  // Listings
  static const String listings = '/listings';
  static const String myListings = '/my-listings';
  static const String search = '/listings/search';
  static const String featured = '/listings/featured';
  static const String nearby = '/listings/nearby';
}
