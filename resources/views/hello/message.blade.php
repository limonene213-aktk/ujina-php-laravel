<!--カラーボックスの中身「の中身」-->

<style>
    .message{
        border:1px solid #e3e8ff;
        margin: 14px 0;
        padding: 12px 16px;
        border-radius: 12px;
        background: linear-gradient(180deg, #ffffff 0%, #f7f8ff 100%);
        box-shadow: 0 10px 22px rgba(30, 40, 90, 0.08);
    }
    .msg_title{margin:8px 12px 6px; color:#6672e5; font-size:16px; font-weight:bold; letter-spacing: 0.4px;}
    .msg_content{margin:0 12px 8px; color:#6c748d; font-size:13px; line-height: 1.7;}
</style>

<div class="message">
    <p class="msg_title">{{$msg_title}}</p>
    <p class="msg_content">{{$msg_content}}</p>
</div>