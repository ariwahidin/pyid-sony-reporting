USE [master]
GO
/****** Object:  Database [DB_YMI]    Script Date: 2024-03-23 5:38:20 AM ******/
CREATE DATABASE [DB_YMI]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'DB_YMI', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.MSSQLSERVER\MSSQL\DATA\DB_YMI.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'DB_YMI_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.MSSQLSERVER\MSSQL\DATA\DB_YMI_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT, LEDGER = OFF
GO
ALTER DATABASE [DB_YMI] SET COMPATIBILITY_LEVEL = 160
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [DB_YMI].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [DB_YMI] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [DB_YMI] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [DB_YMI] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [DB_YMI] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [DB_YMI] SET ARITHABORT OFF 
GO
ALTER DATABASE [DB_YMI] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [DB_YMI] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [DB_YMI] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [DB_YMI] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [DB_YMI] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [DB_YMI] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [DB_YMI] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [DB_YMI] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [DB_YMI] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [DB_YMI] SET  DISABLE_BROKER 
GO
ALTER DATABASE [DB_YMI] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [DB_YMI] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [DB_YMI] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [DB_YMI] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [DB_YMI] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [DB_YMI] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [DB_YMI] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [DB_YMI] SET RECOVERY FULL 
GO
ALTER DATABASE [DB_YMI] SET  MULTI_USER 
GO
ALTER DATABASE [DB_YMI] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [DB_YMI] SET DB_CHAINING OFF 
GO
ALTER DATABASE [DB_YMI] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [DB_YMI] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [DB_YMI] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [DB_YMI] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
EXEC sys.sp_db_vardecimal_storage_format N'DB_YMI', N'ON'
GO
ALTER DATABASE [DB_YMI] SET QUERY_STORE = ON
GO
ALTER DATABASE [DB_YMI] SET QUERY_STORE (OPERATION_MODE = READ_WRITE, CLEANUP_POLICY = (STALE_QUERY_THRESHOLD_DAYS = 30), DATA_FLUSH_INTERVAL_SECONDS = 900, INTERVAL_LENGTH_MINUTES = 60, MAX_STORAGE_SIZE_MB = 1000, QUERY_CAPTURE_MODE = AUTO, SIZE_BASED_CLEANUP_MODE = AUTO, MAX_PLANS_PER_QUERY = 200, WAIT_STATS_CAPTURE_MODE = ON)
GO
USE [DB_YMI]
GO
/****** Object:  User [PYID907]    Script Date: 2024-03-23 5:38:20 AM ******/
CREATE USER [PYID907] FOR LOGIN [PYID907] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  Table [dbo].[master_menu]    Script Date: 2024-03-23 5:38:20 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[master_menu](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[menu_name] [nvarchar](100) NULL,
	[url] [nvarchar](100) NULL,
	[created_at] [datetime] NULL,
	[created_by] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[master_role]    Script Date: 2024-03-23 5:38:21 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[master_role](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[role] [nvarchar](100) NULL,
	[created_at] [datetime2](7) NULL,
	[created_by] [int] NULL,
	[updated_at] [datetime2](7) NULL,
	[updated_by] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[master_user]    Script Date: 2024-03-23 5:38:21 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[master_user](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[fullname] [nvarchar](255) NULL,
	[username] [nvarchar](255) NULL,
	[password] [nvarchar](255) NULL,
	[role] [int] NULL,
	[is_active] [nvarchar](1) NULL,
	[created_at] [datetime2](7) NULL,
	[created_by] [int] NULL,
	[updated_at] [datetime2](7) NULL,
	[updated_by] [int] NULL,
	[is_deleted] [nvarchar](1) NULL,
	[deleted_at] [datetime] NULL,
	[deleted_by] [int] NULL,
 CONSTRAINT [PK__master_u__3213E83F224181FC] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_trans]    Script Date: 2024-03-23 5:38:21 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_trans](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[no_sj] [nvarchar](255) NULL,
	[no_truck] [nvarchar](100) NULL,
	[qty] [int] NULL,
	[checker] [nvarchar](255) NULL,
	[checker_id] [int] NULL,
	[ref_date] [date] NULL,
	[unload_st_time] [datetime] NULL,
	[unload_fin_time] [datetime] NULL,
	[unload_duration] [time](7) NULL,
	[checking_st_time] [datetime] NULL,
	[checking_fin_time] [datetime] NULL,
	[checking_duration] [time](7) NULL,
	[putaway_st_time] [datetime] NULL,
	[putaway_fin_time] [datetime] NULL,
	[putaway_duration] [time](7) NULL,
	[created_by] [nvarchar](255) NULL,
	[created_date] [datetime] NULL,
	[updated_by] [int] NULL,
	[updated_at] [datetime] NULL,
	[is_deleted] [nvarchar](1) NULL,
	[deleted_by] [int] NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_trans_temp]    Script Date: 2024-03-23 5:38:21 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_trans_temp](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[no_sj] [nvarchar](255) NULL,
	[no_truck] [nvarchar](100) NULL,
	[qty] [int] NULL,
	[checker] [nvarchar](255) NULL,
	[checker_id] [int] NULL,
	[tanggal] [date] NULL,
	[start_unloading] [datetime] NULL,
	[stop_unloading] [datetime] NULL,
	[start_checking] [datetime] NULL,
	[stop_checking] [datetime] NULL,
	[start_putaway] [datetime] NULL,
	[stop_putaway] [datetime] NULL,
	[created_by] [nvarchar](255) NULL,
	[created_date] [datetime] NULL,
	[session_id] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[master_menu] ADD  CONSTRAINT [DF_master_menu_created_at]  DEFAULT (getdate()) FOR [created_at]
GO
ALTER TABLE [dbo].[master_role] ADD  DEFAULT (getdate()) FOR [created_at]
GO
ALTER TABLE [dbo].[master_user] ADD  CONSTRAINT [DF_master_user_is_active]  DEFAULT (N'Y') FOR [is_active]
GO
ALTER TABLE [dbo].[master_user] ADD  CONSTRAINT [DF__master_us__creat__49C3F6B7]  DEFAULT (getdate()) FOR [created_at]
GO
ALTER TABLE [dbo].[master_user] ADD  CONSTRAINT [DF_master_user_is_deleted]  DEFAULT (N'N') FOR [is_deleted]
GO
ALTER TABLE [dbo].[tb_trans] ADD  DEFAULT ('N') FOR [is_deleted]
GO
USE [master]
GO
ALTER DATABASE [DB_YMI] SET  READ_WRITE 
GO
