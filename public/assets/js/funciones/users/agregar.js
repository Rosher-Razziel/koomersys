console.log('LLegue a Agregar');
console.log(base_url);

axios.get(base_url + "ping") // ejemplo: ruta que devuelva {"status":"ok"}
.then(response => {
  console.log("Axios funciona ✅", response.data);
})
.catch(error => {
  console.error("Axios no funciona ❌", error);
});