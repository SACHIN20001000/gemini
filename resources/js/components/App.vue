<template>
  <div>
    <h1>Vue Router</h1>

    <p>
      <router-link :to="{ name: 'home' }">Home</router-link> |

      <router-link :to="{ name: 'test' }">Test</router-link> |

      <router-link :to="{ name: 'Example' }">Example</router-link> |

      <router-link :to="{ name: 'Conditional' }">Conditional</router-link> |

      <router-link :to="{ name: 'Registration' }">Registration</router-link>|

      <router-link :to="{ name: 'Profile' }">Profile</router-link>
    </p>
    <notifications group="foo" />
    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {};
</script>