     Dropzone.autoDiscover = false; // 自動初期化を無効化

    const dropzone = new Dropzone("#image-upload", {
        maxFilesize: 2, // 最大ファイルサイズ (MB)
        acceptedFiles: "image/jpeg,image/png", // 許可するファイルタイプ
        addRemoveLinks: true, // 削除ボタンを表示
        dictRemoveFile: "削除", // 削除ボタンのテキスト
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        success: function(file, response) {
            console.log("アップロード成功", response.path);
        },
        error: function(file, response) {
            console.log("アップロード失敗", response);
        }
    });