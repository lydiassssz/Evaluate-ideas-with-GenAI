<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        /* ファイル選択ボタンのスタイル */
        .file-input-container {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .file-input-button {
            color: #fff;
            background-color: #27acd9;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .file-input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }

        .file-input:hover + .file-input-button {
            background-color: #1f82a6;
        }

        input[type='file'] {
            color: rgb(31, 41, 55);
            cursor: pointer;
            border: 1px solid rgb(191, 194, 199);
            border-radius: 0.375rem;
            padding-right: 0.5rem;
            width: 24rem;
        }

        ::file-selector-button,
        ::-webkit-file-upload-button {
            background-color: rgb(209, 213, 219);
            color: rgb(31, 41, 55);
            border: none;
            cursor: pointer;
            border-right: 1px solid rgb(191, 194, 199);
            padding: 0.25rem 1rem;
            margin-right: 1rem;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        button.btn_03 {
            text-align: center;
            vertical-align: middle;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid #27acd9;
            color: #27acd9;
            border-radius: 100vh;
            transition: 0.5s;
            margin-bottom: 10px; /* 絞り込みボタンの下のマージンを追加 */
        }

        button.btn_03:hover {
            color: #fff;
            background: #27acd9;
        }

        .filter-button { /* 絞り込みボタンのスタイル */
            margin-left: auto; /* 右に寄せるためのスタイル */
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        /* リンクスタイル */
        a {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }

        a:hover {
            color: darkblue;
        }

        /* 行ごとの色を設定 */
        tbody tr:nth-child(odd) {
            background-color: #ffffcc; /* 薄い黄色 */
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff; /* 白色 */
        }

        /* ホバー時の色を設定 */
        tbody tr:hover {
            background-color: #f7f7f7; /* グレー */
        }

        /* テーブルセルのスタイル */
        .table-cell {
            max-width: 300px; /* セルの最大幅を設定 */
            overflow: hidden; /* テキストをはみ出した分を隠す */
            text-overflow: ellipsis; /* 見切れたテキストに"..."を追加 */
            white-space: nowrap; /* テキストを折り返さないように設定 */
        }

    </style>
</head>
<body>
    <div class="box">
        <!-- ファイル選択ボタンのコンテナ -->
        <label class="file-input-container">
            <input type="file" id="csv-file" name="files" class="file-input">
            <span class="file-input-button">Choose File</span>
        </label>
    </div>
<table>
    <thead>
    <tr>
        <th><button onclick="sortTable(0)">ID</button></th>
        <th>Problem</th>
        <th>Solution</th>
        <th><button onclick="sortTable(3)">Sum</button></th>
        <th><button onclick="sortTable(4)">Evidence</button></th>
        <th><button onclick="sortTable(6)">Acceptance</button></th>
        <th><button onclick="sortTable(5)">Impact</button></th>

        <th>Note</th>
    </tr>
    </thead>
    <tbody>
    <!-- データ行 -->
    @foreach( $data as $row )
        <tr onclick="window.location.href='{{ route('details', ['id' => ($loop->index +1)]) }}';">
            <td>{{ $row->id }}</td>
            <td class="table-cell">{{ $row->problem }}</td>
            <td class="table-cell">{{ $row->solution }}</td>
            <td>{{ $row->evidence + $row->impact + $row->possible }}/30</td>
            <td>{{ $row->evidence }}/10</td>
            <td>{{ $row->impact }}/10</td>
            <td>{{ $row->possible }}/10</td>
            <td class="table-cell">{{ $row->note }}</td>
        </tr>
    @endforeach

    <!-- データ行は実際のデータを使って動的に生成することが推奨されます -->
    </tbody>
</table>
<script>
    function sortTable(colIndex) {
        const table = document.querySelector('table');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));

        // ソートする際の比較関数
        const comparator = (a, b) => {
            const aContent = a.children[colIndex].textContent;
            const bContent = b.children[colIndex].textContent;
            return bContent.localeCompare(aContent, undefined, { numeric: true, sensitivity: 'base' });
        };

        // ソート実行
        const sortedRows = rows.sort(comparator);

        // ソート後の行をテーブルに追加
        sortedRows.forEach(row => tbody.appendChild(row));
    }
</script>

</body>
</html>
