export default defineNuxtRouteMiddleware((to, from) => {
  const cookie = useCookie('my_auth_token')
  const token = cookie.value

  if (!token) {
    return navigateTo('/auth/login')
  } 
});
