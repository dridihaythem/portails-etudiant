<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/certificate.css' )}}">
</head>

<body>
    <div style="margin-bottom: 10px">
        <center>
            <button onclick="PrintElem('certificate')">Imprimer</button>
        </center>
    </div>
    <div id="certificate">
        <p>الجمهورية التونسية</p>
        <p>وزارة التعليم العالي و البحث التكنولوجي</p>
        <p>الإدارة العامة للدراسات التكنولوجية</p>
        <p class="center">المعهد العالي للدراسات التكنولوجية ببنزت</p>
        <div id="title">شهادة حضور</div>
        <div id="content">
            <p>
                يشهد الكاتب العام ل <strong>المعهد العالي للدراسات التكنولوجية ببنزرت</strong>
                أن الطالب :
            </p>

            <p>
                <strong>الإسم :</strong>
                <span>{{ $certificate->student->last_name}}</span>
            </p>
            <p>
                <strong>اللقب :</strong>
                <span>{{ $certificate->student->first_name}}</span>
            </p>
            <p>
                <strong>المولود في :</strong>
                <span>{{ $certificate->student->birthday->format("d/m/Y")}}</span>
                <span>
                    <strong>ب :</strong>
                    <span>{{ $certificate->student->address}}</span>
                </span>
            </p>
            <p>
                <strong>مرسم ب :</strong>
                <span>
                    @switch($certificate->student->classe->level)
                    @case(1)
                    السنة الاولى
                    @break
                    @case(2)
                    السنة الثانية
                    @break
                    @case(3)
                    السنة الثالثة
                    @break
                    @default

                    @endswitch
                </span>
                <span>
                    <strong>بالفوج :</strong>
                    <span>{{ $certificate->student->classe->name }}</span>
                </span>
                <span>
                    <strong>الإختصاص :</strong>
                    <span>{{ $certificate->student->classe->specialite->name}}</span>
                </span>
            </p>

            <p>
                <strong>تحت عدد :</strong>
                <span>{{ $certificate->student->id}}</span>
            </p>
            <p>
                يواصل دراسته بإنتظام بالنسبة إلى السنة الجامعية الحالية
            </p>
            <p>
                سلمت هذه الشهادة إلى المعني بالأمر للإدلاء بها لدى من له النظر
            </p>
            <p class="float-left">
                بنزرت في
                {{ $certificate->created_at->format("d/m/Y") }}
            </p>
        </div>

        <div class="clear-both"></div>

        <div id="qrcode" class="float-left"></div>

        <div class="clear-both"></div>
        <hr>
        <p>المركب الجامعي طريق منزل عبد الرحمان</p>
        <p>
            الهاتف : 72570601
            الفاكس :72572455
        </p>
    </div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    var qrcode = new QRCode("qrcode", {
    text: "{{ route('certificate-of-attendance.show',$certificate->key) }}",
    width: 128,
    height: 128,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});

function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('<link rel="stylesheet" href="/assets/css/certificate.css" type="text/css" />');
    mywindow.document.write('</head><body >');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    // mywindow.close();

    return true;
}

</script>

</html>