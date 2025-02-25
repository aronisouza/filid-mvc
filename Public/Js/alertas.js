/**
 ### Exibe o alerta com mensagem customizada
 *- Icon => success, error, warning, info, question
 *- mensagem => Escreva a mensagem a ser mostrada
 *- icone => escolha um Icon acima
*/
function alertaPersonalizado(mensagem, icone) {
  Swal.fire({
    icon: icone,
    title: 'Ops!',
    text: mensagem,
    confirmButtonText: 'Tentar novamente',
    confirmButtonColor: '#ff4b4b',
    background: '#f9f9f9',
    color: '#333'
  });
}

/**
 ### Exibe o alerta TOAST com mensagem customizada
 *- Icon => success, error, warning, info, question
 *- mensagem => Escreva a mensagem a ser mostrada
 *- icone => escolha um Icon acima
 *- posicao => top, top-start, top-end, center, center-start, center-end, bottom, bottom-start, bottom-end
*/
function toastAlert(mensagem, icone, posicao)
{
  const Toast = Swal.mixin({
    toast: true,
    position: posicao,
    showConfirmButton: false,
    timer: 3500,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    }
  });
  Toast.fire({
    icon: icone,
    title: mensagem
  });
  
}
