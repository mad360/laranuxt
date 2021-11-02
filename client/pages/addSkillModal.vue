<template>
  <div class="bg-white dark:bg-gray-800 py-8 px-4 sm:px-10">
        inside the modal

  </div>
</template>

<script lang="ts" setup>
interface OauthResult {
  token: string
  user: models.User
  provider: string
  error?: string
}
const emit = defineEmits(['off'])
const ctx = useContext()
const email = ref('')
const loading = reactive({
  attempt: false,
  google: false,
} as Record<string, boolean>)
onMounted(() => { if (process.browser) messageHandler(true) })
onBeforeUnmount(() => { if (process.browser) messageHandler(false) })
async function attempt (): Promise<void> {
  loading.attempt = true
  try {
    await ctx.$axios.post('/attempt', { email })
  } catch (e) {
    loading.attempt = false
    return
  }
  ctx.$toast.show({
    type: 'success',
    title: 'Login E-mail Sent',
    message: `Login link sent to <b>${email.value}</b>`,
    timeout: 5,
  })
  email.value = ''
  loading.attempt = false
  emit('off')
}
function messageHandler (add: boolean): void {
  if (add) return window.addEventListener('message', handleMessage)
  return window.removeEventListener('message', handleMessage)
}
function handleMessage (event: { data: OauthResult }): void {
  if (event.data.user && event.data.token)
    oauthComplete(event.data)
  if (event.data.error)
    ctx.$toast.show({ type: 'danger', message: event.data.error })
}
function login (provider: 'facebook'|'google'): void {
  loading[provider] = true
  const width = 640
  const height = 660
  const left = window.screen.width / 2 - (width / 2)
  const top = window.screen.height / 2 - (height / 2)
  const win = window.open(`${ctx.$axios.defaults.baseURL}/redirect/${provider}`, 'Log In',
    `toolbar=no, location=no, directories=no, status=no, menubar=no, scollbars=no,
      resizable=no, copyhistory=no, width=${width},height=${height},top=${top},left=${left}`)
  const interval = setInterval(() => {
    if (win === null || win.closed) {
      clearInterval(interval)
      loading[provider] = false
    }
  }, 200)
}
const oauthComplete = async (result: OauthResult): Promise<void> => {
  loading[result.provider] = false
  await ctx.$auth.setUserToken(result.token)
  ctx.$toast.show({ type: 'success', message: 'Login Successful' })
  await ctx.app.router?.push('/home')
  emit('off')
}
</script>