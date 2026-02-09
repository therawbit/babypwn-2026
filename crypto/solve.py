from binascii import unhexlify

pt = b"This is a secret message to the people of the world. We are anonymous."
ct1 = unhexlify(
    "201a0b00130a01135654010710410606135a11011112540652475854060a161313175c471817421c5543065b5254050d015f075c1360115203015643135d581a0b0f1c46105c"
)
ct2 = unhexlify(
    "201a075340061141520052041f5204525a44541b4f307630094b07062d53006c541a00681c415601043c42556817001b03470c0f"
)

key = bytes(a ^ b for a, b in zip(pt, ct1))
result = bytes(a ^ b for a, b in zip(ct2, key))

print(result)
