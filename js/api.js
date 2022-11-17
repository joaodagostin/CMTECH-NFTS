const Web3 = require('web3');
const web3 = new Web3('https://wispy-empty-bush.ropsten.discover.quiknode.pro/a81a4a8f3d3e4772b8e77e25216112dca77af305/');
web3.eth.getBlock('latest').then(answer => console.log(answer))
web3.eth.getBlockNumber().then(blockNum => console.log(blockNum))
