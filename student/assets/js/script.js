function upload_image(){
	let data = new FormData();
	data.append('file', file, file.fileName);

	console.log(data)

// 	return (dispatch) => {
// 		axios.post(URL, data, {
// 			headers: {
// 				'accept': 'application/json',
// 				'Accept-Language': 'en-US,en;q=0.8',
// 				'Content-Type': `multipart/form-data; boundary=${data._boundary}`,
// 			}
// 		})
// 		.then((response) => {
//     //handle success
// }).catch((error) => {
//     //handle error
// });
// };
}