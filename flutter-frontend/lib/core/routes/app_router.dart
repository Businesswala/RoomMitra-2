import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import '../../features/auth/screens/splash_screen.dart';
import '../../features/auth/screens/onboarding_screen.dart';
import '../../features/auth/screens/login_screen.dart';
import '../../features/auth/screens/register_screen.dart';
import '../../features/auth/screens/otp_verification_screen.dart';
import '../../features/auth/screens/forgot_password_screen.dart';
import '../../features/home/screens/home_screen.dart';
import '../../features/listing/screens/listing_details_screen.dart';
import '../../features/listing/screens/create_listing_screen.dart';
import '../../features/listing/screens/my_listings_screen.dart';
import '../../features/search/screens/search_screen.dart';
import '../../features/favorites/screens/favorites_screen.dart';
import '../../features/chat/screens/conversation_list_screen.dart';
import '../../features/chat/screens/chat_screen.dart';
import '../../features/notifications/screens/notifications_screen.dart';
import '../../features/profile/screens/profile_screen.dart';
import '../../features/profile/screens/edit_profile_screen.dart';
import '../../features/profile/screens/document_verification_screen.dart';
import '../../features/profile/screens/settings_screen.dart';
import '../../features/plans/screens/plans_screen.dart';
import '../../features/plans/screens/subscription_history_screen.dart';
import '../../features/ads/screens/my_ads_screen.dart';
import '../../features/ads/screens/ad_analytics_screen.dart';
import '../../features/support/screens/support_tickets_screen.dart';
import '../../features/support/screens/ticket_details_screen.dart';

final appRouterGenProvider = Provider<GoRouter>((ref) {
  return GoRouter(
    initialLocation: '/',
    routes: [
      GoRoute(path: '/', builder: (context, state) => const SplashScreen()),
      GoRoute(path: '/onboarding', builder: (context, state) => const OnboardingScreen()),
      GoRoute(path: '/login', builder: (context, state) => const LoginScreen()),
      GoRoute(path: '/register', builder: (context, state) => const RegisterScreen()),
      GoRoute(path: '/forgot-password', builder: (context, state) => const ForgotPasswordScreen()),
      GoRoute(
        path: '/otp-verify',
        builder: (context, state) {
          final extra = state.extra as Map<String, dynamic>;
          return OTPVerificationScreen(emailOrMobile: extra['email_or_mobile'] as String);
        },
      ),
      GoRoute(path: '/home', builder: (context, state) => const HomeScreen()),
      GoRoute(path: '/search', builder: (context, state) => const SearchScreen()),
      GoRoute(path: '/favorites', builder: (context, state) => const FavoritesScreen()),
      GoRoute(path: '/conversations', builder: (context, state) => const ConversationListScreen()),
      GoRoute(
        path: '/chat/:conversationId',
        builder: (context, state) {
          final id = state.pathParameters['conversationId']!;
          return ChatScreen(conversationId: id);
        },
      ),
      GoRoute(path: '/notifications', builder: (context, state) => const NotificationsScreen()),
      GoRoute(path: '/profile', builder: (context, state) => const ProfileScreen()),
      GoRoute(path: '/profile/edit', builder: (context, state) => const EditProfileScreen()),
      GoRoute(path: '/profile/verify', builder: (context, state) => const DocumentVerificationScreen()),
      GoRoute(path: '/profile/settings', builder: (context, state) => const SettingsScreen()),
      
      // Listings
      GoRoute(
        path: '/listings/details/:id',
        builder: (context, state) => ListingDetailsScreen(listingId: state.pathParameters['id']!),
      ),
      GoRoute(path: '/listings/create', builder: (context, state) => const CreateListingScreen()),
      GoRoute(path: '/listings/my', builder: (context, state) => const MyListingsScreen()),

      // Plans & Ads
      GoRoute(path: '/plans', builder: (context, state) => const PlansScreen()),
      GoRoute(path: '/plans/history', builder: (context, state) => const SubscriptionHistoryScreen()),
      GoRoute(path: '/ads', builder: (context, state) => const MyAdsScreen()),
      GoRoute(
        path: '/ads/:id/analytics',
        builder: (context, state) => AdAnalyticsScreen(adId: state.pathParameters['id']!),
      ),

      // Support
      GoRoute(path: '/support', builder: (context, state) => const SupportTicketsScreen()),
      GoRoute(
        path: '/support/tickets/:id',
        builder: (context, state) => TicketDetailsScreen(ticketId: state.pathParameters['id']!),
      ),
    ],
  );
});
